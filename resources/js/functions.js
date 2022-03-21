function strToBool(x) {
    return x === "true";
}

function resetAttribute(elem, attr, value) {
    elem.removeAttribute(attr)
    elem.setAttribute(attr, value)
}

const SKILLS_LEVEL_CLASSES = [
    "",
    "is-link",
    "is-info",
    "is-warning",
    "is-primary"
];

export { strToBool, resetAttribute, SKILLS_LEVEL_CLASSES };
