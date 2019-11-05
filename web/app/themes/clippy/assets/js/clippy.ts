'use strict';

import Breakpoints from "./Tools/Breakpoints";
import AutoScroller from "./Nav/AutoScroller";
import TOC from "./Nav/TOC/TOC";
import SubmitIssue from "./Components/SubmitIssue";

var breakpoints:Breakpoints = null;
document.addEventListener('DOMContentLoaded', function () {
    breakpoints = new Breakpoints();

    new SubmitIssue();

    TOC.bind();
});

AutoScroller.init();
