import '../bootstrap';
import Storage from './storage';
window.app = require('./app');
window.storage = new Storage(app.name);
