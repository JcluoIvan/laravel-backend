function Storage(prefix) {
    this.prefix = prefix;
}

Storage.prototype.itemKey = function(k) {
    return `${this.prefix}:${k}`;
};

Storage.prototype.set = function(key, value) {
    const data = { value };
    if (typeof value === 'object') {
        if ('toJson' in value) {
            data.value = value.toJson();
        } else if ('toString' in value) {
            data.value = value.toString();
        }
    }
    localStorage.setItem(this.itemKey(key), JSON.stringify(data));
    return this;
};

Storage.prototype.get = function(key, def = null) {
    const value = localStorage.getItem(this.itemKey(key));
    const data = value ? JSON.parse(value) : null;
    return data ? data.value : def;
};

export default Storage;
