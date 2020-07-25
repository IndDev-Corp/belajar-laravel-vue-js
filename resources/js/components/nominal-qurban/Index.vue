<template>
    <div>
        <h2>Nominal qurban</h2>
        <div class="card mb-3" v-if="formShow">
            <div class="card-header">
                <h4 class="card-title">Form Tambah Nominal Qurban</h4>
            </div>
            <div class="card-body">
                <form action @submit.prevent="storeNominalQurban()">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_nominal">Nama Nominal</label>
                                <input
                                    v-model="formData.nama_nominal"
                                    id="nama_nominal"
                                    type="text"
                                    :class="['form-control', errors.nama_nominal ? 'is-invalid' : '']"
                                />
                                <span class="invalid-feedback">{{ errors.nama_nominal }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nominal_qurban">Nominal Qurban</label>
                                <input
                                    v-model="formData.nominal_qurban"
                                    id="nominal_qurban"
                                    type="number"
                                    min="10000"
                                    max="30000000"
                                    :class="['form-control', errors.nominal_qurban ? 'is-invalid' : '']"
                                />
                                <span class="invalid-feedback">{{ errors.nominal_qurban }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select v-model="formData.status" id="status" class="form-control">
                                    <option value="Gagal">Gagal</option>
                                    <option value="Menunggu">Menunggu</option>
                                    <option value="Sukses">Sukses</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button
                                type="button"
                                @click.prevent="formShow = false"
                                class="btn btn-danger"
                            >Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Data Nominal Qurban
                    <a
                        href
                        class="btn btn-primary float-right"
                        @click.prevent="formShow = true"
                    >Tambah</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Nominal</th>
                            <th>Nominal Qurban</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="nominalQurban in nominalQurbans">
                            <tr :key="nominalQurban.id">
                                <td>{{ nominalQurban.id }}</td>
                                <td>{{ nominalQurban.nama_nominal }}</td>
                                <td>{{ nominalQurban.nominal_qurban }}</td>
                                <td v-html="nominalQurban.status"></td>
                                <td>
                                    <a class="text-primary" href="#">Ubah</a>
                                    <a class="text-danger" href="#">Hapus</a>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            nominalQurbans: [],
            formShow: false,
            formData: {
                nama_nominal: null,
                nominal_qurban: 10000,
                status: "Gagal",
            },
            errors: {
                nama_nominal: null,
                nominal_qurban: null,
                status: null,
            },
        };
    },
    created() {
        // test variabel
        let hamada = function () {};
        let angka = 1;
        var angka2 = 2;
        let adif = () => {};
        this.getData();
    },
    methods: {
        storeNominalQurban() {
            // validasi
            // let adaError = false;
            // this.errors.nama_nominal = null;
            // this.errors.nominal_qurban = null;
            // if (
            //     this.formData.nama_nominal == "" ||
            //     this.formData.nama_nominal == null
            // ) {
            //     this.errors.nama_nominal = "Nama nominal tidak boleh kosong";
            //     adaError = true;
            // }
            // if (
            //     this.formData.nominal_qurban == "" ||
            //     this.formData.nominal_qurban == null
            // ) {
            //     this.errors.nominal_qurban =
            //         "Nominal qurban tidak boleh kosong";
            //     adaError = true;
            // }
            // if (adaError) {
            //     return;
            // }

            // mengirim data ke tabel nominal qurban
            axios
                .post("/api/nominal-qurban", this.formData)
                .then((response) => {
                    alert(response.data.message);
                    this.getData();
                })
                .catch((error) => {
                    if (error.response.status == 422) {
                        let data = error.response.data;
                        // alert(data.message);
                        let errors = data.errors;
                        if (errors.nama_nominal) {
                            this.errors.nama_nominal = errors.nama_nominal[0];
                        }
                        if (errors.nominal_qurban) {
                            this.errors.nominal_qurban =
                                errors.nominal_qurban[0];
                        }
                        if (errors.status) {
                            this.errors.status = errors.status[0];
                        }
                    }
                });
        },
        getData() {
            // mengambil data dari tabel nominal qurban
            axios.get("/api/nominal-qurban").then((response) => {
                this.nominalQurbans = response.data;
            });
        },
    },
};
</script>
<style scoped>
h2 {
    color: black;
}
</style>