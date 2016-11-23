兼容IE6：



1.border:none;不能去除input标签默认边框，设置background:none;解决



2.line-height: 35px \9; /* css hack \9 代表所有IE浏览器 */



3.引入js使IE6支持透明图片



4.IE6中不允许设置子元素尺寸超出父级



5.IE6中对百分比的解析不好，在使用百分比的地方用确定像素值代替或者用  *xx%  专门设置IE6中的合理值



6.一些对齐问题，例：IE6  _top: xx px;