// global javascript file used for all pages
/*
import Vue from "https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.esm.browser.js";
import VueI18n from "https://cdn.jsdelivr.net/npm/vue-i18n@8.25.0/dist/vue-i18n.esm.browser.js";
import { messages } from "./i18n.js";
import { loadBackToTop } from './backToTop.js'

Vue.use(VueI18n);

const i18n = new VueI18n({
	locale: window.localStorage.getItem("locale")
		? window.localStorage.getItem("locale")
		: "en",
	messages,
	fallbackLocale: "en",
});

new Vue({
	i18n,
	el: "#app",
	methods: {
		changeLocale(newLocale) {
			this.$i18n.locale = newLocale;
			window.localStorage.setItem("locale", newLocale);
		},
	},
});



// enable back to top for all pages
loadBackToTop()
*/


// 储存中英文切换内容，这个可以之后开一个新js文件储存
var arrLang = {
	"en": {
		"medicalService": "Medical Service",
		"medicalInsurance": "Medical Insurance",
		"onlineBooking": "Online Booking",
		"symptomChecker": "Symptom Checker",
		"search": "Search",
		"login": "Login",
		"languages": "Languages",
	},
	"zh": {
		"medicalService": "医疗服务",
		"medicalInsurance": "医疗保险",
		"onlineBooking": "在线预约",
		"symptomChecker": "症状检查",
		"search": "搜索",
		"login": "登录",
		"languages": "语言设置",
	}
}


// 检测语言 默认为英文
// set default language to english
var lang = "en";

// check for local storage support
if('localStorage' in window){
	var usrLang = localStorage.getItem('uiLang');
	if(usrLang) {
		lang = usrLang
	}

}

console.log(lang);

$(document).ready(function() {
	$(".lang").each(function(index, element) {
		$(this).text(arrLang[lang][$(this).attr("key")]);
	});
});

// get/set the selected language
$(function () {
$(".translate").click(function(e){
	e.preventDefault();
	console.log(lang);
	var lang = $(this).attr("id");

	// update local storage
	if ('localStorage' in window) {
		localStorage.setItem('uiLang', lang);
		console.log(localStorage.getItem('uiLang'));
	}

	$(".lang").each(function(index,element) {
		$(this).text(arrLang[lang][$(this).attr("key")]);
	});
});
});
