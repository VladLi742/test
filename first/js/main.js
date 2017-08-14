$.getJSON('https://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.xchange+where+pair+=+%22USDRUB,EURRUB%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=',function(data) {
    var items = [];
    $(data.query.results.rate).each(function(key,val) {
      items.push("<tr>");
      items.push("<td id='" + key + "'>" + val.Name + "</td>");
      items.push("<td id='" + key + "'>" + val.Ask + "</td>");
      items.push("<td id='" + key + "'>" + val.Bid + "</td>");
      items.push("<td id='" + key + "'>" + val.Date + "</td>");
      items.push("<td id='" + key + "'>" + val.Time + "</td>");
      items.push("</tr>");
    });
    $("<tbody/>", {html: items.join("")}).appendTo("table");
  });
$(".btn").click(function() {
  $("tbody").empty();
  $.ajax({
    type: 'GET',
    dataType: 'json',
    url: 'https://query.yahooapis.com/v1/public/yql?q=select+%2A+from+yahoo.finance.xchange+where+pair+=+%22USDRUB,EURRUB%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=',
    success: function ( data ) {
      var items = [];
      $(data.query.results.rate).each(function(key, val) {
        items.push("<tr>");
        items.push("<td id='" + key + "'>" + val.Name + "</td>");
        items.push("<td id='" + key + "'>" + val.Ask + "</td>");
        items.push("<td id='" + key + "'>" + val.Bid + "</td>");
        items.push("<td id='" + key + "'>" + val.Date + "</td>");
        items.push("<td id='" + key + "'>" + val.Time + "</td>");
        items.push("</tr>");
      });
      $("<tbody/>", {html: items.join("")}).appendTo("table");}
    });
  });
