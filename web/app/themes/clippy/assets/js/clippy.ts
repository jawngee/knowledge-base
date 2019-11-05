'use strict';

import Breakpoints from "./Tools/Breakpoints";
import AutoScroller from "./Nav/AutoScroller";
import TOC from "./Nav/TOC/TOC";

var breakpoints:Breakpoints = null;
document.addEventListener('DOMContentLoaded', function () {
    breakpoints = new Breakpoints();

    TOC.bind();
});

AutoScroller.init();
