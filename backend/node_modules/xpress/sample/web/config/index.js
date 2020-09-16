/**
 * @author xpress
 * @date 16/1/10
 * @desc
 */

const path = require('path');

const projectPath = path.join(path.resolve(__dirname), '../');
const privateConfig = require('./' + (process.env.NODE_ENV || 'dev'));

const publicConfig = {
    project:{
        path : projectPath
    },
    server : {
        view : {
            path : path.join(projectPath, 'view'),
            cache : false,
            engine : 'html'
        },
        statics:{
            path : path.join(projectPath, 'public')
        }
    }
};


module.exports = {
    private : privateConfig,
    public : publicConfig
};