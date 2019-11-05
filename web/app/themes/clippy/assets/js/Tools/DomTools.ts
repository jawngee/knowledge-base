'use strict';

export default class DomTools {
    static createElement(html) {
        const element = new DOMParser().parseFromString(html, 'text/html');
        const child = element.documentElement.querySelector('body').firstChild;
        return child;
    }

    static renderTemplate(templateId, data) {
        var scriptEle = document.querySelector('#'+templateId);
        if (scriptEle == null) {
            return null;
        }

        const variableRegex = /\{\{\{\s*([aA-zZ0-9_-]+)\s*\}\}\}/gm;
        var templateText = scriptEle.innerHTML;
        var interpolatedTemplateText = templateText;

        var m;
        while ((m = variableRegex.exec(templateText)) != null) {
            if (data.hasOwnProperty(m[1])) {
                interpolatedTemplateText = interpolatedTemplateText.replace(m[0], data[m[1]]);
            } else {
                interpolatedTemplateText = interpolatedTemplateText.replace(m[0], '');
            }
        }

        return DomTools.createElement(interpolatedTemplateText);
    }
}
