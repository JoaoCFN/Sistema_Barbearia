/**
 * Created by synder on 16/6/21.
 */


const fs = require('../lib/fs');
const assert = require('assert');
const path = require('path');

describe('#all', function() {

   describe('#homedir', function() {
      it('#it should not be null', function () {
         assert.notEqual(fs.homedir(), null);
      });
   });

   describe('#tmpdir', function() {
      it('#it should not be null', function () {
         assert.notEqual(fs.tmpdir(), null);
      });
   });

   describe('#filename', function() {
      it('#it should be etc.conf', function () {
         assert.equal(fs.filename('/usr/etc.conf'), 'etc.conf');
      });
   });

   describe('#filedir', function() {
      it('#it should be /usr', function () {
         assert.equal(fs.filedir('/usr/etc.conf'), '/usr');
      });
   });

   describe('#exists', function() {
      it('#it should not be null', function (done) {
         fs.exists(path.join(__dirname, './fs.test.js'), function (err, result) {
            if(err){
               return done(err);
            }
            assert.equal(result, true);
            done();
         });
      });

      it('#it should not be null', function (done) {
         fs.exists(path.join(__dirname, './fs.tests.js'), function (err, result) {
            if(err){
               return done(err);
            }
            assert.equal(result, false);
            done();
         });
      });
   });

});