
/**
 * Module dependencies.
 */

var express = require('express');
var routes = require('./routes');
var user = require('./routes/user');
var http = require('http');
var path = require('path');
var request = require('request');

var app = express();

// all environments
app.set('port', process.env.PORT || 3000);
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'jade');
app.use(express.favicon(path.join(__dirname, 'public/images/favicon.ico'))); 
app.use(express.logger('dev'));
app.use(express.bodyParser());
app.use(express.methodOverride());
app.use(app.router);
app.use(express.static(path.join(__dirname, 'public')));

// development only
if ('development' == app.get('env')) {
  app.use(express.errorHandler());
}

app.get('/', function(req,res) {
	request({
		uri: 'http://omnicoinexplorer.com/chain/OmniCoin/q/getdifficulty',
		timeout: 3000
}, function(err, resp, body) {
		if (err) {
			res.render('omc', { difficulty: "API DOWN"})
		}
		else {
			console.log(body);
    		res.render('omc', { difficulty: body });
    	}
  	});
  //res.render('omc', { difficulty: difficulty }); 
});

http.createServer(app).listen(app.get('port'), function(){
  console.log('Express server listening on port ' + app.get('port'));
});
