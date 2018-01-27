(function(){
	var ns = window.pw = window.pw || {};
    
    ns.PiWatch = function(config, demo, local){
        this.init(config, demo, local);
    };

    ns.PiWatch.prototype = {
        config: undefined,
        row: undefined,
        init: function(config, demo, local){
            this.config = config;
            this.row = $('#container div.row');
            this._build(demo, local);
        },
        _build: function(demo, local){
            var item, i, j, child, self = this;

            for (i = 0; i < this.config.length; i++) {
                item = this.config[i];
                item.column = $('<div class="col-sm"></div').appendTo(this.row);
                item.card = $('<div class="card"></div>').appendTo(item.column);
                item.card.append($('<h5 class="card-title"></h5>').text(item.name));
                
                for (j = 0; j < item.children.length; j++) {
                    child = item.children[j];

                    switch(child.type) {
                        case 'preview': {
                            item.image = $('<img style="-webkit-user-select: none" class="preview">').attr('interval', child.interval).data('src', child.url).attr('src', child.url);
                            item.card.append(item.image);
                        } break;
                        case 'clicker': {
                            item.button = $('<button type="button" class="btn btn-primary btn-lg garage toggler"></button>').text(child.name).data('url', child.url);
                            item.card.append(item.button);
                        } break;
                    }

                }

                /*
                if (item.type == 'garage') {
                    item.card.append($('<h6 class="card-subtitle mb-2 text-muted">Status</h6>').addClass('checker').attr('onTrue', 'Open').attr('onFalse', 'Closed').attr('gpio', item.options.magGpio));
                    item.card.attr('type', 'garage');
                    item.image = $('<img style="-webkit-user-select: none" class="preview">').attr('src', item.options[local ? 'internalUrl' : 'externalUrl'] || '');
                    item.card.append(item.image);
                    item.button = $('<button type="button" class="btn btn-primary btn-lg garage toggler">Toggle</button>').data('item', item).appendTo(item.card);
                } else if (item.type == 'static_camera') {
                    item.card.attr('type', 'static_camera');
                    item.image = $('<img style="-webkit-user-select: none" class="preview">').attr('src', item.options[local ? 'internalUrl' : 'externalUrl'] || '');
                    item.card.append(item.image);
                }  else {

                }
                */
            }
            
            $('.preview[interval]', this.row).each(function(){
                var ref = $(this), inteval = ref.attr('interval') - 0;
                if (inteval > 0) {
                    setInterval(function(){
                        ref.attr('src', ref.data('src') + '&time=' + new Date());
                    }, inteval);
                }
            });

            $('button.toggler', this.row).click(function(){
                var ref = $(this);
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: ref.data('url'),
                    data: {},
                    success: function(){

                    }
                    });
            });

            /*
            this.row.on('button.toggler', 'click', function(){
                var ref = $(this);

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: ref.attr('url'),
                    data: {},
                    success: function(){

                    }
                  });
            });
            */

            /*
            var checkers = [];
            $('.checker', this.row).each(function(){
                var ref = $(this);
                checkers.push(ref.attr('gpio'));
            });
            if (checkers.length > 0) {
                setInterval(function(){

                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: '/check.php',
                        data: {
                            pins:checkers.join(',')
                        },
                        success: function(response){
                            var i = 0, component;
                            for (i = 0; i < checkers.length; i++) {
                                component = $('.checker[gpio='+checkers[i]+']', self.rows);
                                if (response[checkers[i] == 1]) {
                                    component.text(component.attr('onTrue'));
                                } else {
                                    component.text(component.attr('onFalse'));
                                }
                            }
                        }
                      });

                }, 5000);
            }

            $('button.toggler', this.row).click(function(){
                var ref = $(this), item = ref.data('item');
                if (item.type == 'garage') {
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: '/toggle.php',
                        data: {
                            gpio:item.options.toggleGpio
                        },
                        success: function(){

                        }
                      });
                }
            });
            */

        }
    };

}());