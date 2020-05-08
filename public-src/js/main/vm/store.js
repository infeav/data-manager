/**
 * This file is part of the
 * Infeap Data Manager (https://www.infeap.org/data-manager)
 * open source project
 *
 * @copyright   2018-2020 Tobias Krebs and the Infeap Team
 * @license     https://www.gnu.org/licenses/gpl.html GNU General Public License 3
 */

import Vue from 'vue'
import Vuex from 'vuex'

import modules from './store/modules'

export default {
    init() {
        Vue.use(Vuex)

        this.instance = new Vuex.Store({
            modules,
        })

        return this.instance
    },
}