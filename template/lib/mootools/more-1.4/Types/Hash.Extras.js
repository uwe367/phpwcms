Hash.implement({getFromPath:function(notation){return Object.getFromPath(this,notation)},cleanValues:function(method){return new Hash(Object.cleanValues(this,method))},run:function(){Object.run(arguments)}});