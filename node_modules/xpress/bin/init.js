#!/usr/local/bin/node


const _path = require('path');
const colors = require('colors');
const program = require('commander');

const fs = require('../lib/fs');


const logger = console.log;

program
    .version('2.3.1')
    .option('-p, --path [path]', 'the path project be created')
    .option('-t, --type [type]', 'the type of project, such as : \'web\' or \'api\'')
    .parse(process.argv);

var path = program.path;
var type = program.type;

if(!path){
    logger(colors.red('path should not be null'));
}

if(!type){
    logger(colors.red('type should not be null'));
}

if(type != 'web' && type != 'api'){
    logger(colors.red('type should be "web" or "api"'));
}

var dstPath = _path.join(_path.resolve(path), '/');
var srcPath = _path.join(__dirname, '../sample', type);

fs.mkdir(path, function (err) {
    if(err){
        logger(colors.red(err.stack));
    }

    fs.copy(srcPath, dstPath, function (err) {
        if(err){
            logger(colors.red(err.stack));
        }

        logger(colors.green('project created, run : '));
        logger(colors.green('cd ' + dstPath));
        logger(colors.green('npm install'));
        logger(colors.green('npm start'));
    });
});