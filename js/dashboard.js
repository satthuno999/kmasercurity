/**
 * KMA SERCURITY
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the LICENSE.md file.
 *
 * @author S P A R K <binh9aqktk@gmail.com>
 * @copyright 2022-2023 S P A R K
 *
 */

const id = '{{ model["id"] }}';
const accuracy = JSON.parse('{{ model["accuracy"] }}') * 100;
const precision = JSON.parse('{{ model["precision"] }}') * 100;
const recall = JSON.parse('{{ model["recall"] }}') * 100;

$("#btn-export").click((event) => {
  swal({
    title: "Export",
    buttons: {
      h5: {
        text: "HDF5/H5",
        value: "h5",
        visible: true,
      },
      tflite: {
        text: "TFLite",
        value: "tflite",
        visible: true,
      },
    },
  }).then((format) => {
    location.href = `/models/${id}/source?format=${format}`;
  });
});

Circles.create({
  id: "circles-1",
  radius: 45,
  value: accuracy,
  maxValue: 100,
  width: 8,
  text: `${Math.round(accuracy)}%`,
  colors: ["#f1f1f1", "#2BB930"],
  duration: 400,
  wrpClass: "circles-wrp",
  textClass: "circles-text",
  styleWrapper: true,
  styleText: true,
});

Circles.create({
  id: "circles-2",
  radius: 45,
  value: precision,
  maxValue: 100,
  width: 8,
  text: `${Math.round(precision)}%`,
  colors: ["#f1f1f1", "#2BB930"],
  duration: 400,
  wrpClass: "circles-wrp",
  textClass: "circles-text",
  styleWrapper: true,
  styleText: true,
});

Circles.create({
  id: "circles-3",
  radius: 45,
  value: recall,
  maxValue: 100,
  width: 8,
  text: `${Math.round(recall)}%`,
  colors: ["#f1f1f1", "#2BB930"],
  duration: 400,
  wrpClass: "circles-wrp",
  textClass: "circles-text",
  styleWrapper: true,
  styleText: true,
});

const accuracyData = [
  {
    x: Array.from({ length: 101 }, (x, i) => i),
    y: JSON.parse('{{ model["history"]["accuracy"] | tojson }}'),
    mode: "lines",
    name: "train",
  },
  {
    x: Array.from({ length: 101 }, (x, i) => i),
    y: JSON.parse('{{ model["history"]["val_accuracy"] | tojson }}'),
    mode: "lines",
    name: "validation",
  },
];
const lossData = [
  {
    x: Array.from({ length: 101 }, (x, i) => i),
    y: JSON.parse('{{ model["history"]["loss"] | tojson }}'),
    mode: "lines",
    name: "train",
  },
  {
    x: Array.from({ length: 101 }, (x, i) => i),
    y: JSON.parse('{{ model["history"]["val_loss"] | tojson }}'),
    mode: "lines",
    name: "validation",
  },
];

Plotly.newPlot("accuracy-charts", accuracyData, {
  title: "Model Accuracy",
  xaxis: {
    title: "Epoch",
  },
  yaxis: {
    title: "Accuracy",
  },
});

Plotly.newPlot("loss-charts", lossData, {
  title: "Model Loss",
  xaxis: {
    title: "Epoch",
  },
  yaxis: {
    title: "Loss",
  },
});
