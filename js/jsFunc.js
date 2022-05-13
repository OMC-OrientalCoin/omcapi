function pathfunc()
{
	var path = window.location.pathname;
	var url      = path.split("/");
	
	return "/"+url[1];
}