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

const cal_strings = {
  "es": {
    "months": {
      "1": "Enero",
      "2": "Febrero",
      "3": "Marzo",
      "4": "Abril",
      "5": "Mayo",
      "6": "Junio",
      "7": "Julio",
      "8": "Agosto",
      "9": "Septiembre",
      "10": "Octubre",
      "11": "Noviembre",
      "12": "Diciembre"
    },
    "days": {
      "0": "Dom",
      "1": "Lun",
      "2": "Mar",
      "3": "Mie",
      "4": "Jue",
      "5": "Vie",
      "6": "Sab"
    }
  },
  "en": {
    "months": {
      "1": "January",
      "2": "February",
      "3": "March",
      "4": "April",
      "5": "May",
      "6": "June",
      "7": "July",
      "8": "August",
      "9": "September",
      "10": "October",
      "11": "November",
      "12": "December"
    },
    "days": {
      "0": "Sun",
      "1": "Mon",
      "2": "Tue",
      "3": "Wed",
      "4": "Thu",
      "5": "Fri",
      "6": "Sat"
    }
  }
};
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

    $(".event_calendar").data("activeyear",currentYear);
    $(".event_calendar").data("activemonth",currentMonth);
    $(".event_calendar").find(".current_month h4").html(cal_strings[lang]["months"][currentMonth]+" "+currentYear);
    $(".event_calendar").find(".grid.month[data-year="+currentYear+"][data-month="+currentMonth+"]").addClass("active");
  })(jQuery);

 

  $(".event_calendar .next_month").on("click tap", function(){
    let calendar = $(this).closest(".event_calendar");
    let activeYear = $(calendar).data("activeyear");
    let activeMonth = $(calendar).data("activemonth");
    let newMonth = activeMonth + 1;
    let newYear = activeYear;
    if (newMonth > 12){
      newMonth = 1;
      newYear = activeYear + 1;
    }
    $(calendar).find(".grid.month").removeClass("active");
    $(calendar).find(".current_month h4").html(cal_strings[lang]["months"][newMonth]+" "+newYear);
    $(calendar).data("activeyear",newYear);
    $(calendar).data("activemonth",newMonth);
    $(calendar).find(".grid.month[data-year="+newYear+"][data-month="+newMonth+"]").addClass("active");
  });

  $(".event_calendar .prev_month").on("click tap", function(){
    let calendar = $(this).closest(".event_calendar");
    let activeYear = $(calendar).data("activeyear");
    let activeMonth = $(calendar).data("activemonth");
    let newMonth = activeMonth - 1;
    let newYear = activeYear;
    if (newMonth < 1){
      newMonth = 12;
      newYear = activeYear - 1;
    }
    $(calendar).find(".grid.month").removeClass("active");
    $(calendar).find(".current_month h4").html(cal_strings[lang]["months"][newMonth]+" "+newYear);
    $(calendar).data("activeyear",newYear);
    $(calendar).data("activemonth",newMonth);
    $(calendar).find(".grid.month[data-year="+newYear+"][data-month="+newMonth+"]").addClass("active");
  });

  Array.prototype.remove = function(value) {
    for (var i = this.length; i--; ) {
      if (this[i] === value) {
        this.splice(i, 1);
      }
    }
  }

$(document).on("click",".acc_btn, .acc_head[data-toggle]",function(){
    var cont = $(this).data('toggle');
    $("#"+cont).slideToggle();
});