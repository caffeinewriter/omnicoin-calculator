<!DOCTYPE html><html lang="en"><head><title>Omnicoin Mining Calculator</title><meta charset="utf-8"><link rel="stylesheet" href="./css/gumby.css"><link rel="stylesheet" href="./css/style.css"><script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script><script src="./js/gumby.min.js"></script><script src="./js/plugins.js"></script><script src="./js/main.js"></script></head><body><div gumby-fixed="top" class="navbar"><div class="row"><a href="#" class="toggle"><div class="icon-menu"></div></a><h4 style="color:white !important;" class="six columns logo"><a href="/">Omnicoin Mining Calculator</a></h4><ul class="six columns"><li><a href="https://github.com/caffeinewriter/omnicoin-calculator">Source</a></li></ul></div></div><div class="row"><div class="twelve columns"><script type="text/javascript">$(document).on("ready", function() {
 $("#diff").keyup(function() {
  calculateOmc();
 });
 $("#hrate").keyup(function() {
  calculateOmc();
 });
});
var diff,
 hrate,
 coinsPerYear,
 htime,
 blocksPerYear,
 bcoins = 1000.0;
 var calculateOmc = function() {
 diff = document.getElementById("diff").value;
 hrate= document.getElementById("hrate").value;
 htime = diff * (Math.pow(2.0, 32) / (hrate * 1000.0));
 blocksPerYear = (365.25 * 24.0 * 60.0 * 60.0) / htime;
 coinsPerYear = bcoins * blocksPerYear;
 document.getElementById("cpd").value = (coinsPerYear / 365.25).toFixed(8);
 document.getElementById("cpw").value = (coinsPerYear / 52).toFixed(8);
 document.getElementById("cpm").value = (coinsPerYear / 12).toFixed(8);
};</script><p>This calculator is provided free of charge to gain a rough approximation 
of how many Omnicoins you can earn within a given time period.</p><br><table><tr><td><label for="diff">Difficulty:</label></td><td><input type="text" name="diff" id="diff" value="<?PHP echo file_get_contents("http://omc.chains.doctor-blue.net/chain/Omnicoin/q/getdifficulty"); ?>"></td></tr><tr><td><label for="hrate">Hash Rate (KH/s):</label></td><td><input type="text" name="hrate" id="hrate"></td></tr></table><div class="medium primary btn"><a href="#" onClick="calculateOmc();return(false);">Calculate </a></div><hr><table><tr><td><label for="cpd">OMC Per Day:</label></td><td><input type="text" name="cpd" disabled id="cpd"></td></tr><tr><td><label for="cpw">OMC Per Week:</label></td><td><input type="text" name="cpw" disabled id="cpw"></td></tr><tr><td><label for="cpm">OMC Per Month:</label></td><td><input type="text" name="cpm" disabled id="cpm"></td></tr></table><hr><h3>Changelog</h3><ul class="disc"><li>[01/15/2014]Now it grabs the difficulty automatically!</li><li>[01/15/2014]Moving it to its own independent site.</li><li>[01/15/2014]Now it'll calculate as fast as you can type.</li><li>[01/15/2014]Moving the domain to w1n5t0n.pw, since I had that sitting around.</li><li>[01/15/2014]Open Sourced on Github! Have at ye! Submit pull requests if you can improve upon it!</li><li>[01/15/2014]Removed Coins Per Year, because of Block Halving every 6 months, instead replacing it with Coins Per Week.</li></ul></div><hr></div><div class="row"><p>Donate | oH8vuRNNtf6vyqh4MYJAVCzUgTguFfsb8N</p></div></body></html>