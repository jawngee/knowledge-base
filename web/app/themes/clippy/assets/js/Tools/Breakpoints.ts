'use strict';

export default class Breakpoints {
    public debug:boolean = false;
    public next = null;
    public active = null;
    public breakpoints = null;
    public debugDiv = null;

    private listeners = [];

    constructor() {
        this.debug = false;
        this.next = null;
        this.active = null;

        let breakpointEle = document.getElementById('breakpoints');
        if (!breakpointEle) {
            return;
        }

        let data = null;
        if (breakpointEle != null) {
            data = window.getComputedStyle(breakpointEle, '::after').content;
            data = data.replace(/[']/g, '"').replace(/\\|^[\s\S]{0,1}|[\s\S]$/g, '');
        }

        if (data && (data != 'on') && !(/^\s*$/.test(data))) {
            this.breakpoints = JSON.parse(data);
        } else {
            this.breakpoints = [];
        }

        if (document.body.classList.contains('debug')) {
            this.debug = true;
            this.debugDiv = document.getElementById('breakpoint-debug');
        }

        if (this.breakpoints.length > 0) {
            window.addEventListener('resize', function(){
                this.update();
            }.bind(this));

            this.update();
        }
    }

    addListener(listener) {
        this.listeners.push(listener);
    }

    update() {
        var iw = window.innerWidth;

        var changed = false;
        var lastActiveName = (this.active != null) ? this.active.name : null;

        this.active = null;
        this.next = null;

        if (iw >= this.breakpoints[this.breakpoints.length - 1].size) {
            this.active = this.breakpoints[this.breakpoints.length - 1];
            changed = (lastActiveName != this.active.name);
        } else {
            for(var i=0; i<this.breakpoints.length; i++) {
                if (iw < this.breakpoints[i].size) {
                    if (i>0) {
                        this.active = this.breakpoints[i-1];
                        changed = (lastActiveName != this.active.name);
                    }

                    this.next = this.breakpoints[i];

                    break;
                }
            }
        }

        if (changed) {
            this.listeners.forEach(function(listener){
                listener.breakpointChanged();
            }.bind(this));
            // let event:Event = new Event('breakpointChanged');
            // document.dispatchEvent(event);
        }

        if (this.debug && this.debugDiv) {
            let text = '';

            if (this.active && this.next) {
                text = text + ' ≥ ' + this.active.name + ' (' + this.active.size + 'px)' + '  and  < ' + this.next.name + ' (' + this.next.size + 'px)';
            } else if (!this.next) {
                text = text + ' ≥ ' + this.breakpoints[this.breakpoints.length - 1].name + ' (' + this.breakpoints[this.breakpoints.length - 1].size + 'px)';
            }

            text = text + ' — '+ window.innerWidth + 'px';

            this.debugDiv.innerText = text;
        }
    }
}