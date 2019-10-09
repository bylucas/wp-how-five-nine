/////////// LOADER ///////////

Vue.component('spinner', {
	template: '#spinner-loader',

	props: {
		status: {
			type: Boolean,
			default: true
		},

		rotation: {
			type: Boolean,
			default: true
		},

		size: {
			type: Number,
			default: 30
		},

		depth: {
			type: Number,
			default: 3
		},

		speed: {
			type: Number,
			default: 1.0
		},

		color: {
			type: String,
			default: '#6589b6'
		}
	},

	data() {
		return {
			rotationAnimations: ['forward', 'backward'],
			sizeUnits: 'px',
			timeUnits: 's'
		}
	},

	computed: {
		rotationDirection() {
				return this.rotation ? this.rotationAnimations[0] : this.rotationAnimations[1];
			},

			spinnerSize() {
				return this.size + this.sizeUnits;
			},

			spinnerDepth() {
				return this.depth + this.sizeUnits;
			},

			spinnerSpeed() {
				return this.speed + this.timeUnits;
			},

			spinnerStyle() {
				return {
					borderTopColor: this.hexToRGB(this.color, 0.15),
					borderRightColor: this.hexToRGB(this.color, 0.15),
					borderBottomColor: this.hexToRGB(this.color, 0.15),
					borderLeftColor: this.color,
					width: this.spinnerSize,
					height: this.spinnerSize,
					borderWidth: this.spinnerDepth,
					animationName: this.rotationDirection,
					animationDuration: this.spinnerSpeed
				}
			}
	},
	methods: {
		hexToRGB(hex, alpha) {
			var r = parseInt(hex.slice(1, 3), 16),
				g = parseInt(hex.slice(3, 5), 16),
				b = parseInt(hex.slice(5, 7), 16);

			if (alpha) {
				return `rgba(${r}, ${g}, ${b}, ${alpha})`;
			} else {
				return `rgb(${r}, ${g}, ${b})`;
			}
		}
	}
});

new Vue({
	el: '#app-loader',
	data: function () {
		return {
			spinner: {
				size: 70,
				status: true,
				color: '#B1212F',
				depth: 3,
				rotation: true,
				speed: 0.8
			}
		};
	},
	mounted: function () {
		var body = document.body
		setTimeout(function () {
			body.classList.add('loaded')
		}, 1000)
	}
})

////////////// BACK TO THE TOP ///////////////

Vue.component('backtotop', {
	template: '#backtotop',
	data: function () {
		return {
			isVisible: false
		};
	},
	methods: {
		initToTopButton: function () {
			$(document).bind('scroll', function () {
				var backToTopButton = $('.goTop');
				if ($(document).scrollTop() > 250) {
					backToTopButton.addClass('isVisible');
					this.isVisible = true;
				} else {
					backToTopButton.removeClass('isVisible');
					this.isVisible = false;
				}
			}.bind(this));
		},
		backToTop: function () {
			$('html,body').stop().animate({
				scrollTop: 0
			}, 'slow', 'swing');
		}
	},
	mounted: function () {
		this.$nextTick(function () {
			this.initToTopButton();
		});
	}
});

new Vue({
	el: '#app-top',
});

///////// MODAL ///////////
Vue.component('modal', {
	template: '#modal-template'
})

// start app
new Vue({
	el: '#app-modal',
	data: {
		showModal: false
	}
})

new Vue({
	el: '#app-social-modal',
	data: {
		showModal: false
	}
})

///////// CONTACT ///////////

var emailRE = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

// Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyAi0HZMbjVLKrfYsCdj3To2osTNCBrg6z4",
    authDomain: "subscribe-8cae0.firebaseapp.com",
    databaseURL: "https://subscribe-8cae0.firebaseio.com",
    projectId: "subscribe-8cae0",
    storageBucket: "",
    messagingSenderId: "255887982226",
    appId: "1:255887982226:web:723e7e885efbc23b"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

// Reference messages collection
const db = firebase.firestore();

var usersRef = db.collection('users');


Vue.component('contact', {
	template: '#contact',

	data: function () {
		return {
			newUser: {
				name: '',
				email: '',
				message: ''
			}
		};
	},

	firebase: {
		users: usersRef
	},

	methods: {
		submitForm: function (event) {
			(this.validate()) ? this.success(): this.fail();
		},
		validate: function () {
			return (this.newUser.name != '' && (this.isAnEmail(this.newUser.email))) ? true : false;
		},

		success: function () {
			swal('Success', 'you did it', 'success');
			this.addUser();
			this.saveEntry();


		},

		addUser: function () {
			usersRef.add(this.newUser)
			if (this.success) {
				this.newUser.name = ''
				this.newUser.email = ''
				this.newUser.message = ''
			}
		},

		fail: function () {
			swal('Opps', 'something is wrong', 'error');
		},
		isAnEmail: function (string) {
			return (/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(string)) ? true : false;
		},

		saveEntry: function () {
			this.resetData();
		},
		resetData: function () {
			this.newUser.name = '';
			this.newUser.email = '';
			this.newUser.messsage = ''
		}
	}
})

//Tabs on Author Portfolio page

new Vue({
	el: '#app-tab',
	data: {
		activetab: 0
	}
})