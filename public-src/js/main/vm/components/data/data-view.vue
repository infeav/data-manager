<!--
    This file is part of the
    Infeav Data Manager (https://www.infeav.org/data-manager)
    open source project

    @copyright   2018-2020 Tobias Krebs and the Infeav Team
    @license     https://www.gnu.org/licenses/gpl.html GNU General Public License 3
-->

<template>
    <div class="-component" data-name="data-view">
        {{ dataPath }}
    </div>
</template>

<script>
    export default {
        props: {
            dataPath: {
                type: String,
                required: true,
            },
        },
    }
</script>