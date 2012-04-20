// JavaScript Document
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* Latitude/longitude spherical geodesy formulae & scripts (c) Chris Veness 2002-2010 */
/* - www.movable-type.co.uk/scripts/latlong.html */
/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
function LatLon(a,b,c){if(typeof c=="undefined")c=6371;this._lat=a;this._lon=b;this._radius=c}LatLon.prototype.distanceTo=function(a,b){if(typeof b=="undefined")b=4;var c=this._radius,d=this._lat.toRad(),e=this._lon.toRad(),f=a._lat.toRad(),h=a._lon.toRad(),g=f-d;e=h-e;d=Math.sin(g/2)*Math.sin(g/2)+Math.cos(d)*Math.cos(f)*Math.sin(e/2)*Math.sin(e/2);return(c*2*Math.atan2(Math.sqrt(d),Math.sqrt(1-d))).toPrecisionFixed(b)};
LatLon.prototype.bearingTo=function(a){var b=this._lat.toRad(),c=a._lat.toRad();a=(a._lon-this._lon).toRad();return(Math.atan2(Math.sin(a)*Math.cos(c),Math.cos(b)*Math.sin(c)-Math.sin(b)*Math.cos(c)*Math.cos(a)).toDeg()+360)%360};LatLon.prototype.finalBearingTo=function(a){var b=a._lat.toRad(),c=this._lat.toRad();a=(this._lon-a._lon).toRad();return(Math.atan2(Math.sin(a)*Math.cos(c),Math.cos(b)*Math.sin(c)-Math.sin(b)*Math.cos(c)*Math.cos(a)).toDeg()+180)%360};
LatLon.prototype.midpointTo=function(a){lat1=this._lat.toRad();lon1=this._lon.toRad();lat2=a._lat.toRad();var b=(a._lon-this._lon).toRad();a=Math.cos(lat2)*Math.cos(b);b=Math.cos(lat2)*Math.sin(b);lat3=Math.atan2(Math.sin(lat1)+Math.sin(lat2),Math.sqrt((Math.cos(lat1)+a)*(Math.cos(lat1)+a)+b*b));lon3=lon1+Math.atan2(b,Math.cos(lat1)+a);return new LatLon(lat3.toDeg(),lon3.toDeg())};
LatLon.prototype.destinationPoint=function(a,b){b/=this._radius;a=a.toRad();var c=this._lat.toRad(),d=this._lon.toRad(),e=Math.asin(Math.sin(c)*Math.cos(b)+Math.cos(c)*Math.sin(b)*Math.cos(a));c=d+Math.atan2(Math.sin(a)*Math.sin(b)*Math.cos(c),Math.cos(b)-Math.sin(c)*Math.sin(e));c=(c+3*Math.PI)%(2*Math.PI)-Math.PI;if(isNaN(e)||isNaN(c))return null;return new LatLon(e.toDeg(),c.toDeg())};
LatLon.intersection=function(a,b,c,d){lat1=a._lat.toRad();lon1=a._lon.toRad();lat2=c._lat.toRad();lon2=c._lon.toRad();brng13=b.toRad();brng23=d.toRad();dLat=lat2-lat1;dLon=lon2-lon1;dist12=2*Math.asin(Math.sqrt(Math.sin(dLat/2)*Math.sin(dLat/2)+Math.cos(lat1)*Math.cos(lat2)*Math.sin(dLon/2)*Math.sin(dLon/2)));if(dist12==0)return null;brngA=Math.acos((Math.sin(lat2)-Math.sin(lat1)*Math.cos(dist12))/(Math.sin(dist12)*Math.cos(lat1)));if(isNaN(brngA))brngA=0;brngB=Math.acos((Math.sin(lat1)-Math.sin(lat2)*
Math.cos(dist12))/(Math.sin(dist12)*Math.cos(lat2)));if(Math.sin(lon2-lon1)>0){brng12=brngA;brng21=2*Math.PI-brngB}else{brng12=2*Math.PI-brngA;brng21=brngB}alpha1=(brng13-brng12+Math.PI)%(2*Math.PI)-Math.PI;alpha2=(brng21-brng23+Math.PI)%(2*Math.PI)-Math.PI;if(Math.sin(alpha1)==0&&Math.sin(alpha2)==0)return null;if(Math.sin(alpha1)*Math.sin(alpha2)<0)return null;alpha3=Math.acos(-Math.cos(alpha1)*Math.cos(alpha2)+Math.sin(alpha1)*Math.sin(alpha2)*Math.cos(dist12));dist13=Math.atan2(Math.sin(dist12)*
Math.sin(alpha1)*Math.sin(alpha2),Math.cos(alpha2)+Math.cos(alpha1)*Math.cos(alpha3));lat3=Math.asin(Math.sin(lat1)*Math.cos(dist13)+Math.cos(lat1)*Math.sin(dist13)*Math.cos(brng13));dLon13=Math.atan2(Math.sin(brng13)*Math.sin(dist13)*Math.cos(lat1),Math.cos(dist13)-Math.sin(lat1)*Math.sin(lat3));lon3=lon1+dLon13;lon3=(lon3+Math.PI)%(2*Math.PI)-Math.PI;return new LatLon(lat3.toDeg(),lon3.toDeg())};
LatLon.prototype.rhumbDistanceTo=function(a){var b=this._radius,c=this._lat.toRad(),d=a._lat.toRad(),e=(a._lat-this._lat).toRad();a=Math.abs(a._lon-this._lon).toRad();d=Math.log(Math.tan(d/2+Math.PI/4)/Math.tan(c/2+Math.PI/4));c=!isNaN(e/d)?e/d:Math.cos(c);if(a>Math.PI)a=2*Math.PI-a;return(Math.sqrt(e*e+c*c*a*a)*b).toPrecisionFixed(4)};
LatLon.prototype.rhumbBearingTo=function(a){var b=this._lat.toRad(),c=a._lat.toRad();a=(a._lon-this._lon).toRad();b=Math.log(Math.tan(c/2+Math.PI/4)/Math.tan(b/2+Math.PI/4));if(Math.abs(a)>Math.PI)a=a>0?-(2*Math.PI-a):2*Math.PI+a;return(Math.atan2(a,b).toDeg()+360)%360};
LatLon.prototype.rhumbDestinationPoint=function(a,b){var c=this._radius,d=parseFloat(b)/c,e=this._lat.toRad();c=this._lon.toRad();a=a.toRad();var f=e+d*Math.cos(a),h=f-e,g=Math.log(Math.tan(f/2+Math.PI/4)/Math.tan(e/2+Math.PI/4));e=!isNaN(h/g)?h/g:Math.cos(e);d=d*Math.sin(a)/e;if(Math.abs(f)>Math.PI/2)f=f>0?Math.PI-f:-(Math.PI-f);lon2=(c+d+3*Math.PI)%(2*Math.PI)-Math.PI;return new LatLon(f.toDeg(),lon2.toDeg())};
LatLon.prototype.lat=function(a,b){if(typeof a=="undefined")return this._lat;return Geo.toLat(this._lat,a,b)};LatLon.prototype.lon=function(a,b){if(typeof a=="undefined")return this._lon;return Geo.toLon(this._lon,a,b)};LatLon.prototype.toString=function(a,b){if(typeof a=="undefined")a="dms";return Geo.toLat(this._lat,a,b)+", "+Geo.toLon(this._lon,a,b)};if(typeof String.prototype.toRad==="undefined")Number.prototype.toRad=function(){return this*Math.PI/180};
if(typeof String.prototype.toDeg==="undefined")Number.prototype.toDeg=function(){return this*180/Math.PI};if(typeof String.prototype.toDeg==="undefined")Number.prototype.toPrecisionFixed=function(a){var b=this<0?-this:this,c=this<0?"-":"";if(b==0){for(b="0.";a--;)b+="0";return b}var d=Math.ceil(Math.log(b)*Math.LOG10E);b=String(Math.round(b*Math.pow(10,a-d)));if(d>0){for(l=d-b.length;l-- >0;)b+="0";if(d<b.length)b=b.slice(0,d)+"."+b.slice(d)}else{for(;d++<0;)b="0"+b;b="0."+b}return c+b};

