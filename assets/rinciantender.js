
   var
      data = [{
            title: "Jenis Barang/Jasaaa",
            description: "sss <a href='http://bit.ly/sM1bDf'>book</a> provides a developer-level introduction along with more advanced and useful features of <b>JavaScript</b>.",
            comments: "I would rate it &#x2605;&#x2605;&#x2605;&#x2605;&#x2606;",
            cover: '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">',
            data1: 'adadadadada'
         },
         {
            title: "Satuan",
            description: "This book provides a developer-level introduction along with <b>more advanced</b> and useful features of JavaScript.",
            comments: "This is the book about JavaScript",
            cover: '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">',
            data1: 'adadadadada'
         },
         {
            title: "Vol",
            description: "<em>JavaScript: The Definitive Guide</em> provides a thorough description of the core <b>JavaScript</b> language and both the legacy and standard DOMs implemented in web browsers.",
            comments: "I've never actually read it, but the <a href='http://shop.oreilly.com/product/9780596805531.do'>comments</a> are highly <strong>positive</strong>.",
            cover: '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">',
            data1: 'adadadadada'
         },
         {
            title: "Satuan 2",
            description: "<em>JavaScript: The Definitive Guide</em> provides a thorough description of the core <b>JavaScript</b> language and both the legacy and standard DOMs implemented in web browsers.",
            comments: "I've never actually read it, but the <a href='http://shop.oreilly.com/product/9780596805531.do'>comments</a> are highly <strong>positive</strong>.",
            cover: '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">',
            data1: 'adadadadada'
         },
         {
            title: "Vol 2",
            description: "<em>JavaScript: The Definitive Guide</em> provides a thorough description of the core <b>JavaScript</b> language and both the legacy and standard DOMs implemented in web browsers.",
            comments: "I've never actually read it, but the <a href='http://shop.oreilly.com/product/9780596805531.do'>comments</a> are highly <strong>positive</strong>.",
            cover: '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">',
            data1: 'adadadadada'
         },
         {
            title: "Harga",
            description: "<em>JavaScript: The Definitive Guide</em> provides a thorough description of the core <b>JavaScript</b> language and both the legacy and standard DOMs implemented in web browsers.",
            comments: "I've never actually read it, but the <a href='http://shop.oreilly.com/product/9780596805531.do'>comments</a> are highly <strong>positive</strong>.",
            cover: '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">',
            data1: 'adadadadada'
         }, {
            title: "Pajak",
            description: "<em>JavaScript: The Definitive Guide</em> provides a thorough description of the core <b>JavaScript</b> language and both the legacy and standard DOMs implemented in web browsers.",
            comments: "I've never actually read it, but the <a href='http://shop.oreilly.com/product/9780596805531.do'>comments</a> are highly <strong>positive</strong>.",
            cover: '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">',
            data1: 'adadadadada'
         },
         {
            title: "Total",
            description: "<em>JavaScript: The Definitive Guide</em> provides a thorough description of the core <b>JavaScript</b> language and both the legacy and standard DOMs implemented in web browsers.",
            comments: "I've never actually read it, but the <a href='http://shop.oreilly.com/product/9780596805531.do'>comments</a> are highly <strong>positive</strong>.",
            cover: '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">',
            data1: 'adadadadada'
         }, {
            title: "Keterangan",
            description: "<em>JavaScript: The Definitive Guide</em> provides a thorough description of the core <b>JavaScript</b> language and both the legacy and standard DOMs implemented in web browsers.",
            comments: "I've never actually read it, but the <a href='http://shop.oreilly.com/product/9780596805531.do'>comments</a> are highly <strong>positive</strong>.",
            cover: '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">',
            data1: 'adadadadada'
         }
      ],
      container1,
      hot1;

   container1 = document.getElementById('example1');
   hot1 = new Handsontable(container1, {
      data: data,
      col: 'center',
      height: 'auto',
      colWidths: [200, 200, 200, 50, 200, 200, 200, 200],
      manualColumnResize: true,
      manualRowResize: true,
      colHeaders: ["Jenis Barang/Jasa", "Satuan", "Satuan 2", "Vol 2", "Harga", "Pajak", "Total", "Keterangan"],
      columns: [{
            data: "title",
            renderer: "html"
         },
         {
            data: "description",
            renderer: "html"
         },
         {
            data: "comments",
            renderer: safeHtmlRenderer
         },
         {
            data: "cover",
            renderer: "html"
         },
         {
            data: "data1",
            renderer: "html"
         }
      ]
   });

   function safeHtmlRenderer(instance, td, row, col, prop, value, cellProperties) {
      // be sure you only allow certain HTML tags to avoid XSS threats (you should also remove unwanted HTML attributes)
      td.innerHTML = Handsontable.helper.sanitize(value, {
         ALLOWED_TAGS: ['em', 'b', 'strong', 'a', 'big'],
      });
   }

   function coverRenderer(instance, td, row, col, prop, value, cellProperties) {
      var stringifiedValue = Handsontable.helper.stringify(value);
      var img;

      if (stringifiedValue.indexOf('http') === 0) {
         img = document.createElement('IMG');
         img.src = value;

         Handsontable.dom.addEvent(img, 'mousedown', function(e) {
            e.preventDefault(); // prevent selection quirk
         });

         Handsontable.dom.empty(td);
         td.appendChild(img);
      } else {
         // render as text
         Handsontable.renderers.TextRenderer.apply(this, arguments);
      }
   }