
function initConfigurationsTable()
{
    $("#ConfigurationsProductGrid_c0_all").hide();

    $('#ConfigurationsProductGrid table tbody tr').click(function(){
        if($(this).find('input[disabled]').length > 0)
            return false;
    });
}

function processConfigurableSelection(gridId)
{
    $('#'+gridId+' table tbody tr').removeClass('disabled');
    $('#'+gridId+' table tbody tr').find('input').removeAttr('disabled');

    $('#'+gridId+' table tbody tr.selected').each(function(){
        var signature = '';
        $(this).find("td.eav'").each(function(){
            signature = signature + $(this).text();
        });
        disableOther(gridId, signature);
    });
}

function disableOther(gridId, signature)
{
    $('#'+gridId+' table tbody tr').each(function(){
        var newsignature = '';
        $(this).find("td.eav'").each(function(){
            newsignature = newsignature + $(this).text();
        });
        if(signature == newsignature && !$(this).hasClass('selected'))
        {
            $(this).addClass('disabled');
            $(this).find('input').attr('disabled', 'disabled');
        }
    });
}