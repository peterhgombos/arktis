<!DOCTYPE html>
<html>
<head>
<title>Zatacka :: Arktis by Sigve Sebastian Farstad</title>
<meta charset=utf-8>
<? include('../stats.inc');?>
</head>
<body>
    <style>
        html, body{
            background: #222;
        }
        canvas.emscripten {
            padding: 0;
            margin: 0;
            border: 0;
            position: absolute;
        }
      canvas,
      img {
          image-rendering: crisp-edges;
          image-rendering: -moz-crisp-edges;
          image-rendering: -webkit-optimize-contrast;
          image-rendering: optimize-contrast;
          -ms-interpolation-mode: nearest-neighbor;
      }
      p {
        text-align: center;
        width: 100%;
        color: white;
        font-style: italic;
        font-family: serif;
        font-size: 100px;
        font-weight: thin;
        top: 400px;
      }

    </style>
  </head>
  <p>
  Loading
  </p>

      <canvas class="emscripten" id="canvas" oncontextmenu="event.preventDefault()"></canvas>

    <script>
        window.onresize = (function(){
            var canvas = document.getElementById('canvas');
            return function(){
                var w = window.innerWidth;
                var h = window.innerHeight;
                if(w / 4 * 3 < h){
                    var cw = w;
                    var ch = w / 4 * 3;
                } else {
                    var cw = h / 3 * 4;
                    var ch = h;
                }
                var top = (h - ch) / 2;
                var left = (w - cw) / 2;
                canvas.style.width = cw + 'px';
                canvas.style.height = ch + 'px';
                canvas.style.top = top + 'px';
                canvas.style.left = left + 'px';
            };
        })();
        window.onresize();

    </script>

    <script type='text/javascript'>

      var Module = {
        preRun: [],
        postRun: [],
        print: function() {},
        printErr: function(text) {
          text = Array.prototype.slice.call(arguments).join(' ');
          console.log(text);
        },
        canvas: document.getElementById('canvas'),
        setStatus: function() {},
        totalDependencies: 0,
        monitorRunDependencies: function(left) {
          this.totalDependencies = Math.max(this.totalDependencies, left);
          Module.setStatus(left ? 'Preparing... (' + (this.totalDependencies-left) + '/' + this.totalDependencies + ')' : 'All downloads complete.');
        }
      };
      Module.setStatus('Downloading...');
    </script>
<script type="text/javascript">
var Module;
if (typeof Module === 'undefined') Module = eval('(function() { try { return Module || {} } catch(e) { return {} } })()');
if (!Module.expectedDataFileDownloads) {
  Module.expectedDataFileDownloads = 0;
  Module.finishedDataFileDownloads = 0;
}
Module.expectedDataFileDownloads++;
(function() {

    var PACKAGE_PATH;
    if (typeof window === 'object') {
      PACKAGE_PATH = window['encodeURIComponent'](window.location.pathname.toString().substring(0, window.location.pathname.toString().lastIndexOf('/')) + '/');
    } else {
      // worker
      PACKAGE_PATH = encodeURIComponent(location.pathname.toString().substring(0, location.pathname.toString().lastIndexOf('/')) + '/');
    }
    var PACKAGE_NAME = '/home/sigveseb/em-dosbox/src/zatacka.data';
    var REMOTE_PACKAGE_NAME = (Module['filePackagePrefixURL'] || '') + 'zatacka.data';
    var PACKAGE_UUID = 'dde8d9ad-aed3-4aeb-bcd1-32f14b116134';
  
    function fetchRemotePackage(packageName, callback, errback) {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', packageName, true);
      xhr.responseType = 'arraybuffer';
      xhr.onprogress = function(event) {
        var url = packageName;
        if (event.loaded && event.total) {
          if (!xhr.addedTotal) {
            xhr.addedTotal = true;
            if (!Module.dataFileDownloads) Module.dataFileDownloads = {};
            Module.dataFileDownloads[url] = {
              loaded: event.loaded,
              total: event.total
            };
          } else {
            Module.dataFileDownloads[url].loaded = event.loaded;
          }
          var total = 0;
          var loaded = 0;
          var num = 0;
          for (var download in Module.dataFileDownloads) {
          var data = Module.dataFileDownloads[download];
            total += data.total;
            loaded += data.loaded;
            num++;
          }
          total = Math.ceil(total * Module.expectedDataFileDownloads/num);
          if (Module['setStatus']) Module['setStatus']('Downloading data... (' + loaded + '/' + total + ')');
        } else if (!Module.dataFileDownloads) {
          if (Module['setStatus']) Module['setStatus']('Downloading data...');
        }
      };
      xhr.onload = function(event) {
        var packageData = xhr.response;
        callback(packageData);
      };
      xhr.send(null);
    };

    function handleError(error) {
      console.error('package error:', error);
    };
  
      var fetched = null, fetchedCallback = null;
      fetchRemotePackage(REMOTE_PACKAGE_NAME, function(data) {
        if (fetchedCallback) {
          fetchedCallback(data);
          fetchedCallback = null;
        } else {
          fetched = data;
        }
      }, handleError);
    
  function runWithFS() {

function assert(check, msg) {
  if (!check) throw msg + new Error().stack;
}

    function DataRequest(start, end, crunched, audio) {
      this.start = start;
      this.end = end;
      this.crunched = crunched;
      this.audio = audio;
    }
    DataRequest.prototype = {
      requests: {},
      open: function(mode, name) {
        this.name = name;
        this.requests[name] = this;
        Module['addRunDependency']('fp ' + this.name);
      },
      send: function() {},
      onload: function() {
        var byteArray = this.byteArray.subarray(this.start, this.end);

          this.finish(byteArray);

      },
      finish: function(byteArray) {
        var that = this;
        Module['FS_createPreloadedFile'](this.name, null, byteArray, true, true, function() {
          Module['removeRunDependency']('fp ' + that.name);
        }, function() {
          if (that.audio) {
            Module['removeRunDependency']('fp ' + that.name); // workaround for chromium bug 124926 (still no audio with this, but at least we don't hang)
          } else {
            Module.printErr('Preloading file ' + that.name + ' failed');
          }
        }, false, true); // canOwn this data in the filesystem, it is a slide into the heap that will never change
        this.requests[this.name] = null;
      },
    };
      new DataRequest(0, 5554, 0, 0).open('GET', '/EGAVGA.BGI');
    new DataRequest(5554, 52944, 0, 0).open('GET', '/ZATACKA.EXE');
    new DataRequest(52944, 70299, 0, 0).open('GET', '/TSCR.CHR');

    function processPackageData(arrayBuffer) {
      Module.finishedDataFileDownloads++;
      assert(arrayBuffer, 'Loading data file failed.');
      var byteArray = new Uint8Array(arrayBuffer);
      var curr;
      
      // Reuse the bytearray from the XHR as the source for file reads.
      DataRequest.prototype.byteArray = byteArray;
          DataRequest.prototype.requests["/EGAVGA.BGI"].onload();
          DataRequest.prototype.requests["/ZATACKA.EXE"].onload();
          DataRequest.prototype.requests["/TSCR.CHR"].onload();
          Module['removeRunDependency']('datafile_/home/sigveseb/em-dosbox/src/zatacka.data');

    };
    Module['addRunDependency']('datafile_/home/sigveseb/em-dosbox/src/zatacka.data');
  
    if (!Module.preloadResults) Module.preloadResults = {};
  
      Module.preloadResults[PACKAGE_NAME] = {fromCache: false};
      if (fetched) {
        processPackageData(fetched);
        fetched = null;
      } else {
        fetchedCallback = processPackageData;
      }
    
  }
  if (Module['calledRun']) {
    runWithFS();
  } else {
    if (!Module['preRun']) Module['preRun'] = [];
    Module["preRun"].push(runWithFS); // FS is not initialized yet, wait for it
  }

})();

Module['arguments'] = [ './ZATACKA.EXE' ];
</script>
    <script async type="text/javascript" src="dosbox.js"></script>
  </body>
</html>
