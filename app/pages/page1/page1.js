import {Page} from 'ionic-angular';
import {Http} from 'angular2/http';
import 'rxjs/add/operator/map';

@Page({
  templateUrl: 'build/pages/page1/page1.html'
})
export class Page1 {
	 static get parameters(){
    return [[Http]];
  }
 
  constructor(http) {
    this.http = http;
    this.posts = null;
 
    this.http.get('http://smartrestaurantsolutions.com/mobileapi-test/Tigger.php?funId=5').map(res => res.json()).subscribe(data => {
        this.restaurantList = data.app;
        console.log(this.posts);
    });
 
  }
}
