/**
 * @author xpress
 * @date 16/1/10
 * @desc
 */
const Router = require('Xpress').Router;
const homeRouter = new Router();

const homeCtrl = require('../../controller/home/index');

homeRouter.get('/', homeCtrl.page);

module.exports = homeRouter;