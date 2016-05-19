/*import {Page} from 'ionic-angular';*/
import {Page, NavController, NavParams} from 'ionic-angular';
import {Http} from 'angular2/http';
import 'rxjs/add/operator/map';
import {details} from '../contact-details/details';
@Page({
  templateUrl: 'build/pages/contacts/contacts.html'
})
export class contacts {
	 static get parameters(){
    return [[Http],[NavController], [NavParams]];
  }
  constructor(http,nav, navParams) {
    this.nav = nav;
    this.http = http;
    this.posts = null;
 
    this.http.get('http://localhost/PHP-PDO/config.php?fname=GetContactData').map(res => res.json()).subscribe(data => {
        this.data = data;
    });
  }
  
 itemTapped(item) {
     this.nav.push(details, {
       item: item
     });
     /*console.log(item);*/
  }

}
