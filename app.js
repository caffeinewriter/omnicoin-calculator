
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
		uri: 'http://pool.omnicoin.pw/index.php?page=api&action=getdifficulty&api_key=18040a59c46fabfb4d4c3977a21e80c46fda669fd942320666c8b7b58b4c5a9e',
		timeout: 3000
}, function(err, resp, body) {
		if (err) {
			res.render('omc', { difficulty: "API DOWN"})
		}
		else {
			console.log(body);
			diff = JSON.parse(body);
    		res.render('omc', { difficulty: diff.getdifficulty.data });
    	}
  	});
  //res.render('omc', { difficulty: difficulty }); 
});

http.createServer(app).listen(app.get('port'), function(){
  console.log('Express server listening on port ' + app.get('port'));
});
