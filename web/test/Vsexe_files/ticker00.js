Effect.DefaultOptions.duration = 0.3;
NewsTicker = Class.create();
Object.extend(NewsTicker.prototype, {
	
	tickerDiv: "ticker", 
	tickerLocation: "billboard", 
	tickerTitle: "news-link",
	tickerLink: "/hotnews/",
	feedURL: "/home/feeds/ticker.rss",
	pauseLength: 3500,
	timer: 0,
	currentTitle: 0,
	items: null,
	initialize: function() {
		
		this.items = [];
		
		new Ajax.Request(
			this.feedURL, {
				method: "get",
				onSuccess: function(response) {
					this.parseXML(response.responseXML);
					this.buildTicker();
				}.bind(this),
				onFailure: function() {
					console.log("Please visit http://www.apple.com/hotnews for the latest news and information on Apple.");
				},
				onException: function(req, err) {
					// throw(err);
				}
			}
		);
	},
	
	buildTicker: function() {
		// replace the placeholder content with the first news title
		if (this.items[this.currentTitle]) {
			$(this.tickerTitle).innerHTML = this.items[this.currentTitle]['title'];
			this.start();// start the timer if we have valid headlines
		}
	},
	
	parseXML: function(xml) {
		// build the array of news titles
		$A(xml.getElementsByTagName("item")).each(function(item) {
			title = item.getElementsByTagName("title")[0].childNodes[0].nodeValue;
			var link = NewsTicker.tickerLink;
			this.items.push({title: title, link: link});
		}.bind(this));
	},
	
	start: function() {
		this.interval = setInterval(this.showNext.bind(this), this.pauseLength);
	},
	
	stop: function() {
		clearInterval(this.interval)
	},
	
	showNext: function() {
		
		//determine next headline
		if ( this.currentTitle < this.items.length-1 ) {
			this.currentTitle = this.currentTitle+1;
		} else {
			this.currentTitle = 0;
		}
		
		new Effect.Fade('news-link', {
			afterFinish: function() {
				this.switchData();
				new Effect.Appear('news-link'); }.bind(this)});

	},
	
    switchData: function() {
		$(this.tickerTitle).setAttribute("href", this.tickerLink);
		if (this.items[this.currentTitle]) {
			$(this.tickerTitle).innerHTML = this.items[this.currentTitle]['title'];
		}
	}
});

Event.observe(window, 'load', function() {
	var ticker = new NewsTicker();
});
