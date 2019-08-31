$(function(){
  'use strict';

  var rs1 = new Rickshaw.Graph({
    element: document.querySelector('#rs1'),
    renderer: 'area',
    series: [{
      data: [
        { x: 0, y: 13 },
        { x: 1, y: 12 },
        { x: 2, y: 10 },
        { x: 3, y: 11 },
        { x: 4, y: 12 },
        { x: 5, y: 10 },
        { x: 6, y: 12 },
        { x: 7, y: 10 },
        { x: 8, y: 12 },
        { x: 9, y: 14 },
        { x: 10, y: 8 },
        { x: 11, y: 15 },
        { x: 12, y: 7 },
        { x: 13, y: 10 }
      ],
      color: '#5B93D3',
    }]
  });
  rs1.render();

  // Responsive Mode
  new ResizeSensor($('.kt-mainpanel'), function(){
    rs1.configure({
      width: $('#rs1').width(),
      height: $('#rs1').height()
    });
    rs1.render();
  });

  var rs2 = new Rickshaw.Graph({
    element: document.querySelector('#rs2'),
    renderer: 'area',
    series: [{
      data: [
        { x: 0, y: 5 },
        { x: 1, y: 7 },
        { x: 2, y: 10 },
        { x: 3, y: 11 },
        { x: 4, y: 12 },
        { x: 5, y: 10 },
        { x: 6, y: 9 },
        { x: 7, y: 7 },
        { x: 8, y: 6 },
        { x: 9, y: 8 },
        { x: 10, y: 9 },
        { x: 11, y: 10 },
        { x: 12, y: 7 },
        { x: 13, y: 10 }
      ],
      color: '#7CBDDF',
    }]
  });
  rs2.render();

  // Responsive Mode
  new ResizeSensor($('.kt-mainpanel'), function(){
    rs2.configure({
      width: $('#rs2').width(),
      height: $('#rs2').height()
    });
    rs2.render();
  });

});
