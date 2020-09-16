/**
 * Created by synder on 16/5/31.
 */

const string = require('../lib/string');
const url = require('../lib/url');
const assert = require('assert');

describe('#all', function() {

    describe('#func.pad', function() {
        it('#it should be 0000012222', function() {
            assert.equal(string.pad('12222', 10, '0', 'left'), '0000012222');
        });

        it('#it should be 1222200000', function() {
            assert.equal(string.pad('12222', 10, '0', 'right'), '1222200000');
        });

        it('#it should be 0001222200', function() {
            assert.equal(string.pad('12222', 10, '0', 'both'), '0001222200');
        });
    });

    describe('#func.clean', function() {
        it('#it should be "122 22"', function() {
            assert.equal(string.clean('  122  22  '), '122 22');
        });
    });

    describe('#func.lines', function() {
        it('#it', function() {
            assert.deepEqual(string.lines('122\r\n2'), [ '122', '2' ]);
        });
    });

    describe('#func.truncate', function() {
        it('#it should be 1222123132...', function() {
            assert.deepEqual(string.truncate('122212313213132132', 13, '...'), '1222123132...');
        });
    });

    describe('#func.capitalize', function() {
        it('#it should be Adsccdsdadsw', function() {
            assert.equal(string.capitalize('adsccdsdADSW', true), 'Adsccdsdadsw');
        });

        it('#it should be AdsccdsdADSW', function() {
            assert.equal(string.capitalize('adsccdsdADSW', false), 'AdsccdsdADSW');
        });
    });

    describe('#func.upperCase', function() {
        it('#it should be ADSCCDSDADSW', function() {
            assert.equal(string.upperCase('adsccdsdADSW'), 'ADSCCDSDADSW');
        });
    });

    describe('#func.lowerCase', function() {
        it('#it should be adsccdsdadsw', function() {
            assert.equal(string.lowerCase('adsccdsdADSW'), 'adsccdsdadsw');
        });
    });

    describe('#func.chineseCurrency', function() {
        it('#it should be 玖佰贰拾壹亿零贰佰陆拾萬零肆佰零壹', function() {
            assert.equal(string.chineseCurrency('90002600401.001'), '玖佰亿零贰佰陆拾萬零肆佰零壹');
        });
    });

    describe('#func.currency', function() {
        it('#it should be $242,605,401.001', function() {
            assert.equal(string.currency(242605401.001, '$', 3), '$242,605,401.001');
        });

        it('#it should be $242,605,401.00100', function() {
            assert.equal(string.currency(242605401.001, '$', 5), '$242,605,401.00100');
        });

        it('#it should be $242,605,401.00', function() {
            assert.equal(string.currency(242605401.001, '$'), '$242,605,401.00');
        });
    });

    describe('#func.bankCard', function() {
        it('#it should be 2335 4645 4633 3443 32', function() {
            assert.equal(string.bankCard('233546454633344332'), '2335 4645 4633 3443 32');
        });
    });

    describe('#func.percentage', function() {
        it('#it should be 50%', function() {
            assert.equal(string.percentage(0.5), '50%');
        });
    });

    describe('#func.number', function() {
        it('#it should be 0.500', function() {
            assert.equal(string.number(0.5, 3), '0.500');
        });

        it('#it should be 0.5', function() {
            assert.equal(string.number(0.5), '0.5');
        });

        it('#it should be 0.5', function() {
            assert.equal(string.number(0.5, 0), '1');
        });
    });

    describe('#func.versionPath', function() {
        it('#it should be /name?version=10', function() {
            assert.equal(url.urlPathVersion('/name', 10), '/name?v=10');
        });
    });

    describe('#func.date', function() {
        it('#it should be 2016-06-01', function() {
            assert.equal(string.date(new Date('2016-06-01T07:05:36.838Z'), '-'), '2016-06-01');
        });
    });

    describe('#func.time', function() {
        it('#it should be 14:54:02', function() {
            assert.equal(string.time(new Date('2016-06-01T07:05:36.838Z'), ':'), '15:05:37');
        });
    });

    describe('#func.dateTime', function() {
        it('#it should be 2016-06-01 14:54:02', function() {
            assert.equal(string.dateTime(new Date('2016-06-01T07:05:36.838Z'), '-', ':'), '2016-06-01 15:05:37');
        });
    });

    describe('#func.urlFormat', function() {
        it('#it should be http://127.0.0.1/home?name=1', function() {
            assert.equal(url.urlFormat('/home', {name:1}, 'http', '127.0.0.1'), 'http://127.0.0.1/home?name=1');
        });

        it('#it should be http://127.0.0.1/home?name=1', function() {
            assert.equal(url.urlFormat('/home', {name:1}), '/home?name=1');
        });
    });

});