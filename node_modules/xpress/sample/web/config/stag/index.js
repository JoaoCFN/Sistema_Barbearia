/**
 * @author xpress
 * @date 16/1/10
 * @desc
 */

const path = require('path');
const projectPath = path.join(path.resolve(__dirname), '../../');

module.exports =  {

    project:{
        path : projectPath
    },

    /**
     * 服务器的配置
     * server.port.http  http监听端口,如果不提供则不监听
     * server.port.https https监听端口,如果不提供则不监听，如果两个都提供，两个都监听
     * server.host 绑定的host
     * server.proxy 信任的代理
     * server.key 使用https的时候提供的秘钥
     * server.cert 使用https的时候提供的公钥
     * */
    server: {
        port: {
            http: 8000,
            https: null
        },
        host: null,
        proxy: {
            trust: true
        },
        key: null,
        cert: null,
        cluster: false
    }
};
