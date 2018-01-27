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
            var item, i, self = this;

            for (i = 0; i < this.config.length; i++) {
                item = this.config[i];
                item.column = $('<div class="col-sm"></div').appendTo(this.row);
                item.card = $('<div class="card"></div>').appendTo(item.column);
                item.card.append($('<h5 class="card-title"></h5>').text(item.name));
                
                if (item.type == 'garage') {
                    item.card.append($('<h6 class="card-subtitle mb-2 text-muted">Status</h6>').addClass('checker').attr('onTrue', 'Open').attr('onFalse', 'Closed').attr('gpio', item.options.magGpio));
                    item.card.attr('type', 'garage');
                    item.image = $('<img style="-webkit-user-select: none" class="preview">').attr('src', item.options[local ? 'internalUrl' : 'externalUrl'] || '');
                    item.card.append(item.image);
                    item.button = $('<button type="button" class="btn btn-primary btn-lg garage toggler">Toggle</button>').data('item', item).appendTo(item.card);
                } else {

                }
            }
            
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

        }
    };

}());