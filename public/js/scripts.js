// $(document).ready(function(){
//     $('.miembros-container').slick({
//       infinite:true,
//       dots: true,
//       slidesToShow: 2,
//       speed: 300,
//       arrows: false,
//       slidesToScroll: 1,
//       initialSlide:0,
//       responsive:[
//           {
//               breakpoint: 770,
//               settings: {
//                 slidesToShow:1,
//               }
//           }
//       ]
//     });
//   });
(function($) {
    var CheckboxDropdown = function(el) {
      var _this = this;
      this.isOpen = false;
      this.areAllChecked = false;
      this.$el = $(el);
      this.$label = this.$el.find('.dropdown-label');
      this.$checkAll = this.$el.find('[data-toggle="check-all"]').first();
      this.$inputs = this.$el.find('[type="checkbox"]');
      
      this.onCheckBox();
      
      this.$label.on('click', function(e) {
        e.preventDefault();
        _this.toggleOpen();
      });
      
      this.$checkAll.on('click', function(e) {
        e.preventDefault();
        _this.onCheckAll();
      });
      
      this.$inputs.on('change', function(e) {
        _this.onCheckBox();
      });
    };
    
    CheckboxDropdown.prototype.onCheckBox = function() {
      this.updateStatus();
    };
    
    CheckboxDropdown.prototype.updateStatus = function() {
      var checked = this.$el.find(':checked');
      
      this.areAllChecked = false;
      this.$checkAll.html('Seleccionar todas');
      
      if(checked.length <= 0) {
        this.$label.html('Seleccionar...');
      }
      else if(checked.length === 1) {
        this.$label.html(checked.parent('label').text());
      }
      else if(checked.length === this.$inputs.length) {
        this.$label.html('Todas Seleccionadas');
        this.areAllChecked = true;
        this.$checkAll.html('Deseleccionar todas');
      }
      else {
        this.$label.html(checked.length + ' seleccionadas');
      }
    };
    
    CheckboxDropdown.prototype.onCheckAll = function(checkAll) {
      if(!this.areAllChecked || checkAll) {
        this.areAllChecked = true;
        this.$checkAll.html('Deseleccionar todas');
        this.$inputs.prop('checked', true);
      }
      else {
        this.areAllChecked = false;
        this.$checkAll.html('Seleccionar todas');
        this.$inputs.prop('checked', false);
      }
      
      this.updateStatus();
    };
    
    CheckboxDropdown.prototype.toggleOpen = function(forceOpen) {
      var _this = this;
      
      if(!this.isOpen || forceOpen) {
         this.isOpen = true;
         this.$el.addClass('on');
        $(document).on('click', function(e) {
          if(!$(e.target).closest('[data-control]').length) {
           _this.toggleOpen();
          }
        });
      }
      else {
        this.isOpen = false;
        this.$el.removeClass('on');
        $(document).off('click');
      }
    };
    
    var checkboxesDropdowns = document.querySelectorAll('[data-control="checkbox-dropdown"]');
    for(var i = 0, length = checkboxesDropdowns.length; i < length; i++) {
      new CheckboxDropdown(checkboxesDropdowns[i]);
    }
  })(jQuery);

  Array.prototype.remove = function(value) {
    for (var i = this.length; i--; ) {
      if (this[i] === value) {
        this.splice(i, 1);
      }
    }
  }