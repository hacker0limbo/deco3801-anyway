// global javascript file used for all pages

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