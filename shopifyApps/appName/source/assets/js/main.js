/**
 * BASIC script appPanel
 */

const APP_NAME = 'appName';
const BASE_URL = 'YOU-WEB-URL';


const REQUEST = {
	__active( isActive ) {
		return new Promise ( resolve => {
			let url = BASE_URL + '/shopifyApps/'+ APP_NAME +'/source/appPanel.php?shop=app4dev&active=' + isActive + '&v='+ Date.now();
			resolve( fetch(url).then(result => result.json()) );
		})
	},
	__get() {
		return new Promise( resolve => {
			let url = BASE_URL + '/shopifyApps/'+ APP_NAME +'/source/appPanel.php?shop=app4dev&script=true&v=' + Date.now();
			resolve(fetch(url).then(result => result.json()))
		})
	}
}


Vue.component( 'button-active', {
	template: `
		<div class="button">
		<input type="checkbox" v-model="active" v-on:change="toggle"/> 
		<span>active app</span>
		</div>
	`,

	data: function() {
		return {
			active: false,
		}
	},
	methods: {
		toggle: function() {
			REQUEST.__active( this.active )
				.then( result => { console.log( result ) })
		},
	},
	created: function() {
		REQUEST.__get()
			.then( result => {
				this.active = result;
			})
	},
})


const app = new Vue({
	el: '#app'
})


