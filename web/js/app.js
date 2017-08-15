
var app = window.CMS_app || {};
app = {
    debug:true,
    language:'en',
    flashMessage:false,
    token:null,
    getMsg:function(code){
        return this.lang[this.language][code]
    },
    report:function(string){
        if(this.debug){
            console.log(string);
        }
        if(this.flashMessage){
            if (typeof jQuery.jGrowl === 'undefined') {
                console.log('error jGrowl plugin not included');
            }else{
                $.jGrowl(string);
            }
        }
    },
    close_alert:function(aid){
        $('#alert'+aid).fadeOut(1000);
        $.cookie('alert'+aid,true,{
            expires:1, // one day
            path: '/'
        });
    },
    hasChecked: function(has, classes){
        if($(has).is(':checked')){
            $(classes).removeClass('hidden');
        }else{
            $(classes).addClass('hidden');
        }
    },
    addLoader:function(text){
        if(text!==undefined){
            var t = text;
        }else{
            var t = 'Loading...';
        }
        $('body').append('<div class="ajax-loading">'+t+'</div>');
    },
    removeLoader:function(){
        $('.ajax-loading').remove();
    },
    closeReport:function(){
        $.jGrowl('close');  
    },
    init:function(){
        this.report('application init()');
    },
    ajax:function(url,data,success,dataType,type){
        var t = this;
        $.ajax({
            url:url,
            type:(type==undefined)?'POST':type,
            data:data,
            dataType:(dataType==undefined)?'html':dataType,
            beforeSend:function(xhr){
            // if(t.ajax.beforeSend.message){
            //t.report(t.ajax.beforeSend.message);
            //}else{
            // t.report(t.getText('loadingText'));
            //}
                
            },
            error:function(xhr, textStatus, errorThrown){
                t.report(textStatus+' ajax() '+xhr.status+' '+xhr.statusText);
            //t.report(textStatus+' ajax() '+xhr.responseText);
            },
            success:success
            
        });
    },


    setText:function(param, text){
        this.lang[this.language][param]=text;
    },
    getText:function(param){
        return app.lang[this.language][param];
    },
    lang:{
        en:{
            error:'Error',
            loadingText:'Loading...'
        },
        ru:{
            error:'Ошибка',
            loadingText:'Загрузка...'
        }
    },
    enterSubmit:function(formid){
        $(formid).keydown(function(event){ 
            if (event.which == 13) {
                // event.preventDefault();
                $(formid).submit();
            }
        });  
    }
};
app.init();

