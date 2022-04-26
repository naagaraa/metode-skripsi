function checkbus(family = 5, member = []) {
  if (family == member.length) {
    member.sort();
    max_familily = 4;

    // init box
    random_bus = [];
    max_bus = [];

    for (let index = 0; index < member.length; index++) {
      if (member[index] == max_familily) {
        max_bus.push(member[index]);
        continue;
      } else if (member[index] <= max_familily) {
        random_bus.push(member[index]);
      }
    }

    let sum_b = 0;
    random_bus.forEach((e) => {
      sum_b += e;
    });

    a = sum_b / 4;
    b = max_bus.length;

    console.log("Minimum bus required is : " + Math.ceil(a + b));
  } else {
    console.log("Input must be equal with count of family");
  }
}

// keluarga = 5;
// anggota = [1, 2, 4, 3, 3];
// keluarga = 8;
// anggota = [2, 3, 4, 4, 2, 1, 3, 1];
keluarga = 5;
anggota = [1, 5];
checkbus(keluarga, anggota);

// vowel

function vocal(string = "") {
  string = string.toLocaleLowerCase();
  string = string.replace(" ", "");
  string = string.split("");
  vocal = "aiueo";
  result = [];

  string.forEach((value) => {
    if (vocal.includes(value)) {
      result.push(value);
    }
  });

  result.sort();
  console.log("Vowel Character:");
  console.log(result.join(" "));
}

function consonant(string = "") {
  string = string.toLocaleLowerCase();
  string = string.replace(" ", "");
  string = string.split("");
  vocal = "aiueo";
  result = [];

  string.forEach((value) => {
    if (!vocal.includes(value)) {
      result.push(value);
    }
  });

  result.sort().reverse();
  console.log("consonant Character:");
  console.log(result.join(" "));
}

function main(string) {
  vocal(string);
  consonant(string);
}

main("sample case");
