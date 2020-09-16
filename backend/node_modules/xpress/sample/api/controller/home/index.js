/**
 * @author xpress
 * @date 16/1/10
 * @desc
 */


exports.index = function(req, res, next){
    res.json({
        code: 1,
        msg : null,
        data : {
            version : 1.0
        }
    });
};

exports.data = function(req, res, next){

    console.log(req.body);
    
    res.json({
        code: 1,
        msg : null,
        data : {
            version : 1.0
        }
    });
};