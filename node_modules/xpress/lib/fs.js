/**
 * Created by synder on 16/6/21.
 */


const _fs = require('fs');
const _os = require('os');
const _url = require('url');
const _path = require('path');
const _http = require('http');
const _https = require('https');
const _readline = require('readline');
const async = require('async');
const crypto = require('crypto');

/**
 * @desc 获取当前用户的家目录
 * */
var homedir = function () {
    if (process.platform == 'win32') {
        return process.env.USERPROFILE;
    } else {
        return process.env.HOME;
    }
};

/**
 * @desc 获取系统的缓存目录
 * */
var tmpdir = function () {
    return _os.tmpdir();
};

/**
 * @desc 获取文件名
 * */
var filename = function (path) {
    return _path.basename(path);
};

/**
 * @desc 获取文件所在文件夹
 * */
var filedir = function (path) {
    return _path.dirname(path);
};

/**
 * @desc 判断文件或者文件夹是否存在
 * */
var exists = function (path, callback) {
    _fs.stat(path, function (err, stats) {
        if (err) {
            if (err && 'ENOENT' === err.code) {
                return callback(null, false);
            }

            return callback(err);
        }

        callback(null, !!stats);
    });
};

/**
 * @desc 创建文件夹
 * */
var mkdir = function (dir, opts, callback, made) {

    const _0777 = parseInt('0777', 8);

    if (typeof opts === 'function') {
        callback = opts;
        opts = {};
    } else if (!opts || typeof opts !== 'object') {
        opts = {mode: opts};
    }

    var mode = opts.mode;

    if (mode === undefined) {
        mode = _0777 & (~process.umask());
    }
    if (!made) made = null;

    var cb = callback || function () {
        };
    dir = _path.resolve(dir);

    _fs.mkdir(dir, mode, function (er) {
        if (!er) {
            made = made || dir;
            return cb(null, made);
        }
        switch (er.code) {
            case 'ENOENT':
                mkdir(_path.dirname(dir), opts, function (er, made) {
                    if (er) {
                        cb(er, made);
                    } else {
                        mkdir(dir, opts, cb, made);
                    }
                });
                break;
            default:
                _fs.stat(dir, function (er2, stat) {
                    if (er2 || !stat.isDirectory()) {
                        cb(er, made)
                    } else {
                        cb(null, made);
                    }
                });
                break;
        }
    });
};

/**
 * @desc 浅层遍历目录
 * */
var list = function (path, iterator, callback) {
    _fs.readdir(path, function (err, files) {
        if (err) {
            if (err && 'ENOENT' === err.code) {
                return callback(null);
            }

            return callback(err);
        }
        async.forEach(files, function (file, next) {
            iterator(path, file, next);
        }, callback);
    });
};

/**
 * @desc 深沉遍历目录
 * */
var walk = function (path, iterator, callback) {

    path = _path.resolve(path);

    list(path, function (path, file, next) {

        var temp = _path.join(path, file);

        _fs.lstat(temp, function (err, stats) {

            if (err) {
                if ('ENOENT' === err.code) {
                    return next(null);
                }
                return next(err);
            }

            if (stats.isDirectory()) {
                return walk(temp, iterator, next);
            }

            iterator(path, file, next);
        });
    }, callback);
};

/**
 * @desc 读取文件
 * */
var read = function (path, opt, callback) {
    _fs.readFile.apply(_fs, arguments);
};

/**
 * @desc 逐行读取文件
 * */
var readline = function (path, iterator, callback) {

    var inStream = _fs.createReadStream(path).on('error', callback);

    const rl = _readline.createInterface({
        input: inStream,
        output: null
    });

    rl.on('line', function (line) {
        iterator(line);
    });

    rl.on('close', callback);
};

/**
 * @desc 保存文件
 * */
var save = function (path, data, opt, callback) {
    _fs.writeFile.apply(_fs, arguments);
};

/**
 * @desc 追加保存文件
 * */
var append = function (path, data, opt, callback) {
    _fs.appendFile.apply(_fs, arguments);
};

/**
 * @desc 新建文件
 * */
var touch = function (path, opt, callback) {
    var content = new Buffer(0);

    if (opt && !opt.override) {
        _fs.stat(path, function (err, stats) {
            if (err) {
                return callback && callback(err);
            }

            if (stats.isFile()) {
                return callback && callback(null);
            }

            _fs.writeFile(path, content, opt, callback);
        });
    } else {
        _fs.writeFile(path, content, opt, callback);
    }
};

/**
 * @desc 赋值文件或者文件夹
 * */
var copy = function (src, dst, callback) {

    src = _path.resolve(src);
    dst = _path.resolve(dst);

    callback = callback || function () {
        };

    if (src == dst) {
        return callback();
    }

    _fs.stat(src, function (err, stats) {
        if (err) {
            return callback(err);
        }

        if (stats.isFile()) {

            _fs.stat(dst, function (err, stats) {
                if (err) {
                    return callback(err);
                }

                var dstPath = dst;

                if (stats.isDirectory()) {
                    dst = _path.join(dstPath, _path.basename(src));
                }

                mkdir(dstPath, function (err) {
                    if (err) {
                        return callback(err);
                    }

                    var inStream = _fs.createReadStream(src, {bufferSize: 64 * 1024}).on('error', callback);
                    var outStream = _fs.createWriteStream(dst).on('error', callback).on('close', callback);
                    inStream.pipe(outStream);
                });
            });
        } else {
            mkdir(dst, function (err) {
                if (err) {
                    return callback(err);
                }

                //copy dir
                walk(src, function (path, file, next) {

                    var srcFilePath = _path.join(path, file);
                    var dstFilePath = _path.join(dst, _path.relative(src, srcFilePath));

                    var dstPath = _path.dirname(dstFilePath);

                    mkdir(dstPath, function (err) {
                        if (err) {
                            return next(err);
                        }

                        var inStream = _fs.createReadStream(srcFilePath).on('error', next);
                        var outStream = _fs.createWriteStream(dstFilePath).on('error', next).on('close', next);
                        inStream.pipe(outStream);
                    });
                }, function (err) {
                    callback(err);
                });

            });
        }
    });
};

/**
 * @desc 剪切文件或者文件夹
 * */
var move = function (src, dst, callback) {
    src = _path.resolve(src);
    dst = _path.resolve(dst);

    callback = callback || function () {
        };

    if (src == dst) {
        return callback();
    }

    _fs.stat(src, function (err, stats) {
        if (err) {
            return callback(err);
        }

        if (stats.isFile()) {

            _fs.stat(dst, function (err, stats) {
                if (err) {
                    return callback(err);
                }

                var dstPath = dst;

                if (stats.isDirectory()) {
                    dst = _path.join(dstPath, _path.basename(src));
                }

                mkdir(dstPath, function (err) {
                    if (err) {
                        return callback(err);
                    }

                    var inStream = _fs.createReadStream(src, {bufferSize: 64 * 1024}).on('error', callback);
                    var outStream = _fs.createWriteStream(dst).on('error', callback).on('close', function () {
                        _fs.unlink(src, callback);
                    });
                    inStream.pipe(outStream);
                });
            });
        } else {

            mkdir(dst, function (err) {
                if (err) {
                    return callback(err);
                }

                //copy dir
                walk(src, function (path, file, next) {

                    var srcFilePath = _path.join(path, file);
                    var dstFilePath = _path.join(dst, _path.relative(src, srcFilePath));

                    var dstPath = _path.dirname(dstFilePath);

                    mkdir(dstPath, function (err) {
                        if (err) {
                            return next(err);
                        }

                        var inStream = _fs.createReadStream(srcFilePath).on('error', next);
                        var outStream = _fs.createWriteStream(dstFilePath).on('error', next).on('close', next);
                        inStream.pipe(outStream);
                    });
                }, function (err) {
                    if (err) {
                        return callback(err);
                    }

                    remove(src, callback);
                });

            });
        }
    });
};

/**
 * @desc 重命名文件或者文件夹
 * */
var rename = function (oldPath, newPath, callback) {
    _fs.rename.apply(_fs, arguments);
};

/**
 * @desc 检测用户是否有权限
 * */
var access = function (path, opt, callback) {
    var mode = null;

    if (opt.r) {
        mode = mode | _fs.R_OK;
    }

    if (opt.w) {
        mode = mode | _fs.W_OK;
    }

    if (opt.x) {
        mode = mode | _fs.X_OK;
    }

    _fs.access(path, mode, callback);
};

/**
 * @desc 删除文件或者文件夹
 * */
var remove = function (path, callback) {
    path = _path.resolve(path);

    _fs.stat(path, function (err, stats) {
        if (err) {
            if ('ENOENT' === err.code) {
                return callback(null);
            }
            return callback(err);
        }

        if (!stats.isDirectory()) {
            return _fs.unlink(path, callback);
        }

        list(path, function (path, file, next) {
            remove(_path.join(path, file), next);
        }, function (err) {

            if (err) {
                return callback && callback(err);
            }
            _fs.rmdir(path, callback)
        });
    });
};

/**
 * @desc 观察文件或者文件夹
 * */
var watch = function (path, callback) {
    _fs.watch(path, callback);
};

/**
 * @desc 异步计算文件MD5
 * */
var md5 = function (filepath, encode, callback) {

    filepath = _path.resolve(filepath);

    if (typeof encode === 'function') {
        callback = encode;
        encode = 'hex';
    }

    var inStream = _fs.createReadStream(filepath);

    var hash = crypto.createHash('md5');

    inStream.on('data', function (content) {
        hash.update(content);
    });

    inStream.on('error', function (err) {
        callback(err);
    });

    inStream.on('end', function () {
        callback(null, hash.digest(encode));
    });

};

/**
 * @desc 获取网络文件
 * */
var fetch = function (url, dst, filename, callback) {

    if(!dst){
        return callback(new Error('dst path should not be null'));
    }

    var temp = _url.parse(url);

    if(typeof filename !== 'string'){
        callback = filename || function () {};
        filename = _path.basename(temp.pathname);
    }

    var options = {
        protocol: temp.protocol,
        hostname: temp.hostname,
        port: temp.port,
        path: temp.path,
        method: 'GET'
    };

    dst = _path.resolve(dst);

    mkdir(dst, function (err) {
        if(err){
            return callback(err);
        }

        var filePath = _path.join(dst, filename);

        if(temp.protocol == 'http:'){
            _http.request(options, function (res) {
                res.on('data', function (chunk) {
                    if(chunk.length > 0){
                        append(filePath, chunk);
                    }
                });
                res.on('end', function () {
                    callback(null, filePath);
                })
            }).on('error', function (err) {
                remove(filePath, function () {
                    callback(err);
                });
            }).end();
        }else{
            _https.request(options, function (res) {
                res.on('data', function (chunk) {
                    if(chunk.length > 0){
                        append(filePath, chunk);
                    }
                });
                res.on('end', function () {
                    callback(null, filePath);
                })
            }).on('error', function (err) {
                remove(filePath, function () {
                    callback(err);
                });
            }).end();
        }
    });
};


//get dir
exports.homedir = homedir;
exports.tmpdir = tmpdir;

//get file name or dir
exports.filename = filename;
exports.filedir = filedir;

//create stream
exports.createReadStream = _fs.createReadStream;
exports.createWriteStream = _fs.createWriteStream;

//fs method
exports.chmod = _fs.chmod;
exports.chown = _fs.chown;
exports.link = _fs.link;
exports.unlink = _fs.unlink;
exports.utimes = _fs.utimes;
exports.stat = _fs.stat;

//fs extend method
exports.exists = exists;
exports.mkdir = mkdir;
exports.list = list;
exports.walk = walk;
exports.read = read;
exports.readline = readline;
exports.save = save;
exports.append = append;
exports.touch = touch;
exports.copy = copy;
exports.move = move;
exports.rename = rename;
exports.access = access;
exports.watch = watch;
exports.md5 = md5;
exports.fetch = fetch;