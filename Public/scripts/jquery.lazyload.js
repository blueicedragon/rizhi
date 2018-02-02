(function(d, a, c, e) {
	var b = d(a);
	d.fn.lazyload = function(j) {
		var i = this;
		var g;
		var f = {
			threshold: 0,
			failure_limit: 0,
			event: "scroll",
			effect: "fadeIn",
			container: a,
			data_attribute: "original",
			skip_invisible: true,
			appear: null,
			load: null,
			placeholder: "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
		};

		function h() {
			var k = 0;
			i.each(function() {
				var l = d(this);
				if (f.skip_invisible && !l.is(":visible")) {
					return
				}
				if (d.abovethetop(this, f) || d.leftofbegin(this, f)) {} else {
					if (!d.belowthefold(this, f)) {
						l.trigger("appear");
						k = 0
					} else {
						if (++k > f.failure_limit) {
							return false
						}
					}
				}
			})
		}
		if (j) {
			if (e !== j.failurelimit) {
				j.failure_limit = j.failurelimit;
				delete j.failurelimit
			}
			if (e !== j.effectspeed) {
				j.effect_speed = j.effectspeed;
				delete j.effectspeed
			}
			d.extend(f, j)
		}
		g = (f.container === e || f.container === a) ? b : d(f.container);
		if (0 === f.event.indexOf("scroll")) {
			g.bind(f.event, function() {
				return h()
			})
		}
		this.each(function() {
			var l = this;
			var k = d(l);
			l.loaded = false;
			if (k.attr("src") === e || k.attr("src") === false) {
				if (k.is("img")) {
					k.attr("src", f.placeholder)
				}
			}
			k.one("appear", function() {
				if (!this.loaded) {
					if (f.appear) {
						var m = i.length;
						f.appear.call(l, m, f)
					}
					d("<img />").bind("load", function() {
						var o = k.attr("data-" + f.data_attribute);
						k.hide();
						if (k.is("img")) {
							k.attr("src", o)
						} else {
							k.css("background-image", "url('" + o + "')")
						}
						k[f.effect](f.effect_speed);
						l.loaded = true;
						var p = d.grep(i, function(q) {
							return !q.loaded
						});
						i = d(p);
						if (f.load) {
							var n = i.length;
							f.load.call(l, n, f)
						}
					}).attr("src", k.attr("data-" + f.data_attribute))
				}
			});
			if (0 !== f.event.indexOf("scroll")) {
				k.bind(f.event, function() {
					if (!l.loaded) {
						k.trigger("appear")
					}
				})
			}
		});
		b.bind("resize", function() {
			h()
		});
		if ((/(?:iphone|ipod|ipad).*os 5/gi).test(navigator.appVersion)) {
			b.bind("pageshow", function(k) {
				if (k.originalEvent && k.originalEvent.persisted) {
					i.each(function() {
						d(this).trigger("appear")
					})
				}
			})
		}
		d(c).ready(function() {
			h()
		});
		return this
	};
	d.belowthefold = function(h, f) {
		var g;
		if (f.container === e || f.container === a) {
			g = (a.innerHeight ? a.innerHeight : b.height()) + b.scrollTop()
		} else {
			g = d(f.container).offset().top + d(f.container).height()
		}
		return g <= d(h).offset().top - f.threshold
	};
	d.rightoffold = function(h, f) {
		var g;
		if (f.container === e || f.container === a) {
			g = b.width() + b.scrollLeft()
		} else {
			g = d(f.container).offset().left + d(f.container).width()
		}
		return g <= d(h).offset().left - f.threshold
	};
	d.abovethetop = function(h, f) {
		var g;
		if (f.container === e || f.container === a) {
			g = b.scrollTop()
		} else {
			g = d(f.container).offset().top
		}
		return g >= d(h).offset().top + f.threshold + d(h).height()
	};
	d.leftofbegin = function(h, f) {
		var g;
		if (f.container === e || f.container === a) {
			g = b.scrollLeft()
		} else {
			g = d(f.container).offset().left
		}
		return g >= d(h).offset().left + f.threshold + d(h).width()
	};
	d.inviewport = function(g, f) {
		return !d.rightoffold(g, f) && !d.leftofbegin(g, f) && !d.belowthefold(g, f) && !d.abovethetop(g, f)
	};
	d.extend(d.expr[":"], {
		"below-the-fold": function(f) {
			return d.belowthefold(f, {
				threshold: 0
			})
		},
		"above-the-top": function(f) {
			return !d.belowthefold(f, {
				threshold: 0
			})
		},
		"right-of-screen": function(f) {
			return d.rightoffold(f, {
				threshold: 0
			})
		},
		"left-of-screen": function(f) {
			return !d.rightoffold(f, {
				threshold: 0
			})
		},
		"in-viewport": function(f) {
			return d.inviewport(f, {
				threshold: 0
			})
		},
		"above-the-fold": function(f) {
			return !d.belowthefold(f, {
				threshold: 0
			})
		},
		"right-of-fold": function(f) {
			return d.rightoffold(f, {
				threshold: 0
			})
		},
		"left-of-fold": function(f) {
			return !d.rightoffold(f, {
				threshold: 0
			})
		}
	})
})(jQuery, window, document);