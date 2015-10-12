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

          s = new Date(dateRangeParser.parse(toParse).start).toString();
          e = new Date(dateRangeParser.parse(toParse).end).toString();
          return s + " - " + e;
      },
        projects: function(){
            return findProjects(this.activity).join(", ");
        },
        tags: function(){
            return findTags(this.activity).join(", ");
        }
    }
});