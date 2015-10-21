Vue.config.debug = true;

function findTags(str)
{
    if(!str || str.length == 0)
        return [];
    var re = /(#[a-z0-9][a-z0-9\-_]*)/ig;
    return str.match(re);
}

function findProjects(str)
{
    if(!str || str.length == 0)
        return [];
    var re = /(@[a-z0-9][a-z0-9\-_]*)/ig;
    return str.match(re);
}

function startLoading(el)
{
    el.html('Loading');
}

function finishLoading(el)
{
    el.html('');
}

$(document).ready(function(){

    $('.tagcloud').each(function(){
        var src = $(this).data('src');
        var el = $(this);
        startLoading(el);
        $.getJSON(src, function(data){
            finishLoading(el);
            el.jQCloud(data);
        });
    });

    var data = {
        labels : [],
        series : [[]]
    };

    var dataPeriod = {
        labels : [],
        series : [[]]
    };

    projects.forEach(function(e, idx){
        data.labels.push(e.title);
        data.series[0].push(e.total/3600);
    });

    activities.forEach(function(e, idx){
        dataPeriod.labels.push(e.day);
        dataPeriod.series[0].push(e.value/3600);
    });

    // Create a new line chart object where as first parameter we pass in a selector
    // that is resolving to our chart container element. The Second parameter
    // is the actual data object.
    new Chartist.Bar('.ct-chart-total', data, {
        reverseData: true,
        horizontalBars: true
    });

    new Chartist.Line('.ct-chart-period', dataPeriod, {
        lineSmooth: Chartist.Interpolation.simple({
            divisor: 2
        }),
        low: 0
    });
});

new Vue({
   el: '#entry',
    data: {
        activity: ""
    },
    computed: {
      interval: function(){
          p = findProjects(this.activity);
          t = findTags(this.activity);

          toParse = this.activity;

          p.forEach(function(el){
              toParse = toParse.replace(el, "");
          });

          t.forEach(function(el){
              toParse = toParse.replace(el, "");
          });

      },
        projects: function(){
            return findProjects(this.activity).join(", ");
        },
        tags: function(){
            return findTags(this.activity).join(", ");
        },
        "class": function(){
            var countProjects = findProjects(this.activity).length;
            return countProjects > 0 ? 'success':'alert';
        }
    }
});
//# sourceMappingURL=app.js.map
