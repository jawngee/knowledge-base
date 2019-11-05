'use strict';

export default class TOCEntry {
    readonly li:HTMLLIElement;
    readonly tracked:HTMLElement;

    constructor(li:HTMLLIElement, tracked:HTMLElement) {
        this.li = li;
        this.tracked = tracked;
    }

    test(windowHeight:number) {
        let top = this.tracked.getBoundingClientRect().top;

        if ((top > -10) && (top < windowHeight * 0.25)) {
            this.li.classList.add('current');
            return true;
        }

        return false;
    }

    current() {
        return this.li.classList.contains('current');
    }
}