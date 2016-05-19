import {Page,NavParams} from 'ionic-angular';


@Page({
  templateUrl: 'build/pages/contact-details/details.html'
})
export class details {
	 static get parameters(){
    return [[NavParams]];
  }
	constructor(NavParams){
		this.Person =NavParams.data.item;
		this.months =["Jannuary","February","March","April","May","June","August","September","Octobar","November","December"];
		this.payment =[
		{'month':'Jannuary','amount':2000,'status':'Paid'},
		{'month':'February','amount':2000,'status':'Paid'},
		{'month':'March','amount':2000,'status':'Paid'},
		{'month':'April','amount':2000,'status':'Paid'},
		{'month':'May','amount':2000,'status':'Paid'},
		{'month':'June','amount':2000,'status':'Paid'},
		{'month':'July','amount':2000,'status':'Paid'},
		{'month':'August','amount':2000,'status':'Paid'},
		{'month':'September','amount':2000,'status':'Paid'},
		{'month':'Octobar','amount':2000,'status':'Paid'},
		{'month':'November','amount':2000,'status':'Paid'},
		{'month':'December','amount':2000,'status':'Paid'}



		];
	}
	
}
