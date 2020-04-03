function ajaxnews(url)
{
    var xmlHttpReq = new XMLHttpRequest();
    xmlHttpReq.open('GET', url);
    xmlHttpReq.onreadystatechange = function() 
	{
		if (xmlHttpReq.readyState == 4 && xmlHttpReq.status == 200) 
		{
			data = JSON.parse(xmlHttpReq.responseText);
			dataList= data.articles;
			dataList.forEach(function(obj)
			{
				addItem(obj,"carousel-item active");
			})
		}
    }
    xmlHttpReq.send(null);
}