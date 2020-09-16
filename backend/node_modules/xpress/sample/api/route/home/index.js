/**
 * @author xpress
 * @date 16/1/10
 * @desc
 */
const Router = require('Xpress').Router;
const homeRouter = new Router();

const homeCtrl = require('../../controller/home/index');

homeRouter.post('/',{v:1, c:1}, homeCtrl.data);

module.exports = homeRouter;