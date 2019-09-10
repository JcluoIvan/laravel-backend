import { Vue as VueD } from 'vue/types/vue';
interface App {
    name: string;
    title: string;
}
declare const Vue: VueD;

interface AppStorage {
    itemKey: (key: string) => string;
    get: (key: string, def?: any) => any;
    set: (key: string, value: any) => this;
}
declare const storage: AppStorage;
