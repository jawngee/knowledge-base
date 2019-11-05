'use strict';

import TOCEntry from "./TOCEntry";

export default class TOC {
    private toc:HTMLUListElement;
    private entries:TOCEntry[] = [];
    private animTimer:any = null;
    private windowHeight:number = null;
    private currentEntry:TOCEntry = null;

    constructor(toc:HTMLUListElement) {
        this.toc = toc;
        this.toc.querySelectorAll('li[data-tracks]').forEach((li:HTMLLIElement) => {
            let tracked = document.getElementById(li.dataset.tracks);
            if (tracked != null) {
                let entry = new TOCEntry(li, tracked);
                this.entries.push(entry);
                if (entry.current()) {
                    this.currentEntry = entry;
                }
            }
        });


        this.windowHeight = window.innerHeight;

        window.addEventListener('scroll', () => {
            cancelAnimationFrame(this.animTimer);
            this.animTimer = requestAnimationFrame(this.processScroll.bind(this));
        });

        window.addEventListener('resize', () => {
            this.windowHeight = window.innerHeight;
        });
    }

    processScroll() {
        this.entries.forEach((entry:TOCEntry) => {
            if (entry.test(this.windowHeight)) {
                if (entry != this.currentEntry) {
                    this.currentEntry.li.classList.remove('current');
                    this.currentEntry = entry;
                }
            }
        });
    }

    static bind() {
        document.querySelectorAll('ul[data-tracked]').forEach((ul:HTMLUListElement) => {
            new TOC(ul);
        });
    }
}