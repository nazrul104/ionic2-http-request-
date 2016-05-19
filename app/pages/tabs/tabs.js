import {Page} from 'ionic-angular';
import {contacts} from '../contacts/contacts';
import {Page2} from '../page2/page2';
import {Page3} from '../page3/page3';


@Page({
  templateUrl: 'build/pages/tabs/tabs.html'
})
export class TabsPage {
  constructor() {
    // this tells the tabs component which Pages
    // should be each tab's root Page
    this.tab1Root = contacts;
   /* this.tab2Root = Page2;
    this.tab3Root = Page3;*/
  }
    itemTapped(item) {
        console.log(this.tab1Root);
}
}
